<?php

namespace WePayV3;

use WePayV3\Contracts\BasicOrder;

/**
 * 平台收付通 | 订单支付接口
 * Class EcommerceOrder
 * @package WePayV3
 */
class EcommerceOrder extends BasicOrder
{
    /**
     * 创建支付订单
     * @param string $type 支付类型
     * @param array $data 支付参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_2_2.shtml
     */
    public function create($type, $data)
    {
        $types = [
            self::WXPAY_H5     => '/v3/pay/partner/transactions/h5',
            self::WXPAY_APP    => '/v3/pay/partner/transactions/app',
            self::WXPAY_JSAPI  => '/v3/pay/partner/transactions/jsapi',
            self::WXPAY_NATIVE => '/v3/pay/partner/transactions/native',
        ];
        return $this->_create($types, $type, $data);
    }

    /**
     * 支付订单查询
     * @param string $transaction_id 支付订单号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_2_5.shtml
     */
    public function query($transaction_id)
    {
        $pathinfo = "/v3/pay/partner/transactions/id/{$transaction_id}";
        return $this->doRequest('GET', "{$pathinfo}?sp_mchid={$this->config['sp_mchid']}&sub_mchid={$this->config['sub_mch_id']}", '', true);
    }

    /**
     * 关闭支付订单
     * @param string $tradeNo 订单单号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_2_6.shtml
     */
    public function close($tradeNo)
    {
        $data = ['sp_mchid' => $this->config['sp_mchid'], 'sub_mch_id' => $this->config['sub_mch_id']];
        $path = "/v3/pay/partner/transactions/out-trade-no/{$tradeNo}/close";
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }
}
