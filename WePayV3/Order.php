<?php

// +----------------------------------------------------------------------
// | WeChatDeveloper
// +----------------------------------------------------------------------
// | 版权所有 2014~2025 ThinkAdmin [ thinkadmin.top ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// | 免责声明 ( https://thinkadmin.top/disclaimer )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/WeChatDeveloper
// | github 代码仓库：https://github.com/zoujingli/WeChatDeveloper
// +----------------------------------------------------------------------

namespace WePayV3;

use WeChat\Contracts\Tools;
use WePayV3\Contracts\BasicOrder;
use WePayV3\Contracts\DecryptAes;

/**
 * 直连商户 | 订单支付接口
 * Class Order
 * @package WePayV3
 */
class Order extends BasicOrder
{
    /**
     * 创建支付订单
     * @param string $type 支付类型
     * @param array $data 支付参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3/apis/chapter3_1_1.shtml
     */
    public function create($type, $data)
    {
        $types = [
            self::WXPAY_H5     => '/v3/pay/transactions/h5',
            self::WXPAY_APP    => '/v3/pay/transactions/app',
            self::WXPAY_JSAPI  => '/v3/pay/transactions/jsapi',
            self::WXPAY_NATIVE => '/v3/pay/transactions/native',
        ];
        return $this->_create($types, $type, $data);
    }

    /**
     * 支付订单查询
     * @param string $tradeNo 订单单号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3/apis/chapter3_1_2.shtml
     */
    public function query($tradeNo)
    {
        $pathinfo = "/v3/pay/transactions/out-trade-no/{$tradeNo}";
        return $this->doRequest('GET', "{$pathinfo}?mchid={$this->config['mch_id']}", '', true);
    }

    /**
     * 关闭支付订单
     * @param string $tradeNo 订单单号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     */
    public function close($tradeNo)
    {
        $data = ['mchid' => $this->config['mch_id']];
        $path = "/v3/pay/transactions/out-trade-no/{$tradeNo}/close";
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }

    /**
     * 创建退款订单
     * @param array $data 退款参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3/apis/chapter3_1_9.shtml
     */
    public function createRefund($data)
    {
        $path = '/v3/refund/domestic/refunds';
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }

    /**
     * 退款订单查询
     * @param string $refundNo 退款单号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3/apis/chapter3_1_10.shtml
     */
    public function queryRefund($refundNo)
    {
        $path = "/v3/refund/domestic/refunds/{$refundNo}";
        return $this->doRequest('GET', $path, '', true);
    }

    /**
     * 申请交易账单
     * @param array|string $params
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3/apis/chapter3_3_6.shtml
     */
    public function tradeBill($params)
    {
        $path = '/v3/bill/tradebill?' . is_array($params) ? http_build_query($params) : $params;
        return $this->doRequest('GET', $path, '', true);
    }

    /**
     * 申请资金账单
     * @param array|string $params
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3/apis/chapter3_3_7.shtml
     */
    public function fundflowBill($params)
    {
        $path = '/v3/bill/fundflowbill?' . is_array($params) ? http_build_query($params) : $params;
        return $this->doRequest('GET', $path, '', true);
    }
}
