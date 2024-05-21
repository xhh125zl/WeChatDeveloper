<?php

namespace WePayV3;

use WePayV3\Contracts\BasicWePay;

/**
 * 平台收付通（商户进件）
 * Class Ecommerce
 * @package WePayV3
 * @auther xhh
 */
class Ecommerce extends BasicWePay
{
    /**
     * 电商二级商户进件（提交申请单）
     * @param array $data 请求参数
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_1_1.shtml
     */
    public function submitApplyments($data)
    {
        $path = '/v3/ecommerce/applyments/';
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }

    /**
     * 查询申请状态：通过申请单ID查询申请状态
     * @param string $applyment_id 微信支付申请单号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_1_2.shtml
     */
    public function queryApplymentsById($applyment_id)
    {
        $path = "/v3/ecommerce/applyments/{$applyment_id}";
        return $this->doRequest('GET', $path, '', true);
    }

    /**
     * 查询申请状态：通过业务申请编号查询申请状态
     * @param string $out_request_no 业务申请编号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter7_1_2.shtml
     */
    public function queryApplymentsByNo($out_request_no)
    {
        $path = "/v3/ecommerce/applyments/out-request-no/{$out_request_no}";
        return $this->doRequest('GET', $path, '', true);
    }

    /**
     * 查询申请状态：通过业务申请编号查询申请状态
     * @param string $file_url 图片本地全部路径，例如：\www\data\a.jpg
     * @param string $file_name 图片名称（包含后缀），例如：a.jpg
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter2_1_1.shtml
     */
    public function uploadImage($file_url, $file_name = '')
    {
        // 没有定义图片名称的，则使用图片路径解析名称
        if (empty($file_name)) $file_name = basename($file_url);

        $data = [
            'file' => fread(fopen($file_url, 'rb'), filesize($file_url)),
            'media' => [
                'filename' => $file_name,
                'sha256' => hash('sha256', file_get_contents($file_url)),
            ]
        ];

        $path = "v3/merchant/media/upload";
        return $this->doRequest('POST', $path, json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }
}
