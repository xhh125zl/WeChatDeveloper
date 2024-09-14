<?php

namespace WePayV3;

use WePayV3\Contracts\BasicOrder;

/**
 * 平台收付通 | 合单支付接口
 * Class EcommerceCombineOrder
 * @package WePayV3
 */
class EcommerceCombineOrder extends BasicOrder
{
    /**
     * 创建支付订单
     * @param string $type 支付类型
     * @param array $data 支付参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_3_3.shtml
     */
    public function create($type, $data)
    {
        $types = [
            self::WXPAY_H5     => '/v3/combine-transactions/h5',
            self::WXPAY_APP    => '/v3/combine-transactions/app',
            self::WXPAY_JSAPI  => '/v3/combine-transactions/jsapi',
            self::WXPAY_NATIVE => '/v3/combine-transactions/native',
        ];
        return $this->_create($types, $type, $data);
    }

    /**
     * 支付订单查询
     * @param string $tradeNo 订单单号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_3_11.shtml
     */
    public function query($tradeNo)
    {
        $pathinfo = "/v3/combine-transactions/out-trade-no/{$tradeNo}";
        return $this->doRequest('GET', $pathinfo, '', true);
    }

    /**
     * 关闭支付订单
     * @param string $tradeNo 订单单号
     * @param array $sub_orders 子单信息
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_3_12.shtml
     */
    public function close($tradeNo, $sub_orders)
    {
        $data = ['combine_appid' => $this->config['sp_appid'], 'sub_orders' => $sub_orders];
        $path = "/v3/combine-transactions/out-trade-no/{$tradeNo}/close";
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }
}
