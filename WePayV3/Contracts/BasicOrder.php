<?php

// +----------------------------------------------------------------------
// | WeChatDeveloper
// +----------------------------------------------------------------------
// | 版权所有 2014~2024 ThinkAdmin [ thinkadmin.top ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// | 免责声明 ( https://thinkadmin.top/disclaimer )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/WeChatDeveloper
// | github 代码仓库：https://github.com/zoujingli/WeChatDeveloper
// +----------------------------------------------------------------------

namespace WePayV3\Contracts;

use WeChat\Contracts\Tools;
use WeChat\Exceptions\InvalidArgumentException;
use WeChat\Exceptions\InvalidResponseException;
use WePayV3\Contracts\BasicWePay;
use WePayV3\Contracts\DecryptAes;

/**
 * 订单基础类
 * Class BasicOrder
 * @package WePayV3
 */
class BasicOrder extends BasicWePay
{
    const WXPAY_H5 = 'h5';
    const WXPAY_APP = 'app';
    const WXPAY_JSAPI = 'jsapi';
    const WXPAY_NATIVE = 'native';

    /**
     * 创建支付订单
     * @param array $types 支付类型对应的url
     * @param string $type 支付类型
     * @param array $data 支付参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     */
    protected function _create($types, $type, $data)
    {
        if (empty($types[$type])) {
            throw new InvalidArgumentException("Payment {$type} not defined.");
        } else {
            // 自动填充 mchid 和 appid（如果未提供）
            if (empty($data['mchid']) && !empty($this->config['mch_id'])) {
                $data['mchid'] = $this->config['mch_id'];
            }
            if (empty($data['appid']) && !empty($this->config['appid'])) {
                $data['appid'] = $this->config['appid'];
            }
            // 创建预支付码
            $result = $this->doRequest('POST', $types[$type], json_encode($data, JSON_UNESCAPED_UNICODE), true);
            if (empty($result['h5_url']) && empty($result['code_url']) && empty($result['prepay_id'])) {
                $message = isset($result['code']) ? "[ {$result['code']} ] " : '';
                $message .= isset($result['message']) ? $result['message'] : json_encode($result, JSON_UNESCAPED_UNICODE);
                throw new InvalidResponseException($message);
            }
            // 支付参数签名
            $time = strval(time());
            $appid = $this->config['appid'];
            $nonceStr = Tools::createNoncestr();
            if ($type === self::WXPAY_APP) {
                $sign = $this->signBuild(join("\n", [$appid, $time, $nonceStr, $result['prepay_id'], '']));
                return ['appId' => $appid, 'partnerId' => $this->config['mch_id'], 'prepayId' => $result['prepay_id'], 'package' => 'Sign=WXPay', 'nonceStr' => $nonceStr, 'timeStamp' => $time, 'sign' => $sign];
            } elseif ($type === self::WXPAY_JSAPI) {
                $sign = $this->signBuild(join("\n", [$appid, $time, $nonceStr, "prepay_id={$result['prepay_id']}", '']));
                return ['appId' => $appid, 'timestamp' => $time, 'timeStamp' => $time, 'nonceStr' => $nonceStr, 'package' => "prepay_id={$result['prepay_id']}", 'signType' => 'RSA', 'paySign' => $sign];
            } else {
                return $result;
            }
        }
    }
    
    /**
     * 支付通知解析
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidDecryptException
     */
    public function notify(array $data = [])
    {
        if (empty($data)) {
            $data = json_decode(Tools::getRawInput(), true);
        }
        if (isset($data['resource'])) {
            $aes = new DecryptAes($this->config['mch_v3_key']);
            $data['result'] = $aes->decryptToString(
                $data['resource']['associated_data'],
                $data['resource']['nonce'],
                $data['resource']['ciphertext']
            );
        }
        return $data;
    }

    /**
     * 获取退款通知
     * @param mixed $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidDecryptException
     * @deprecated 直接使用 Notify 方法
     */
    public function notifyRefund($data = [])
    {
        return $this->notify($data);
    }

    /**
     * 下载账单文件
     * @param string $fileurl
     * @return string 二进制 Excel 内容
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_6_1.shtml
     */
    public function downloadBill($fileurl)
    {
        return $this->doRequest('GET', $fileurl, '', false, false);
    }
}
