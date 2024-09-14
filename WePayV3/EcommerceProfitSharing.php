<?php

namespace WePayV3;

use WePayV3\Contracts\BasicWePay;

/**
 * 平台收付通 | 商家分账
 * Class EcommerceProfitSharing
 * @package WePayV3
 */
class EcommerceProfitSharing extends BasicWePay
{
    /**
     * 请求分账
     * @param array $data 请求参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_4_1.shtml
     */
    public function profitShare($data)
    {
        $path = "/v3/ecommerce/profitsharing/orders";
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }

    /**
     * 查询分账结果
     * @param array $data 请求参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_4_2.shtml
     */
    public function queryProfitShare($data)
    {
        $path = "/v3/ecommerce/profitsharing/orders";

        $params = http_build_query($data);
        return $this->doRequest('GET', "{$path}?{$params}", '', true);
    }

    /**
     * 完结分账
     * @param array $data 请求参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_4_5.shtml
     */
    public function finishProfitShare($data)
    {
        $path = "/v3/ecommerce/profitsharing/finish-order";
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }
}
