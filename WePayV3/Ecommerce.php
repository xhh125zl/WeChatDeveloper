<?php

namespace WePayV3;

use WeChat\Contracts\Tools;
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
     * 上传图片
     * @param string $file_url 图片本地全部路径，例如：\www\data\a.jpg
     * @param string $file_name 图片名称（包含后缀），例如：a.jpg
     * @return array
     * @throws \WeChat\Exceptions\LocalCacheException
     * @document https://pay.weixin.qq.com/wiki/doc/apiv3_partner/apis/chapter2_1_1.shtml
     */
    public function uploadImage($file_url, $file_name = '')
    {
        $path = "/v3/merchant/media/upload";

        // 没有定义图片名称的，则使用图片路径解析名称
        if (empty($file_name)) $file_name = basename($file_url);

        $meta['filename'] = $file_name; // 文件名称
        $meta['sha256'] = hash_file('sha256', $file_url); // 文件生成哈希值

        $boundary = "abcdefg"; // 分割符号 （为商户自定义的一个字符串）
        $customHeader = [
            'Content-Type' => 'multipart/form-data; boundary=' . $boundary,
        ];
        $header = $this->_getHeader('POST', $path, json_encode($meta, JSON_UNESCAPED_UNICODE), $customHeader);

        $boundaryStr = "--{$boundary}\r\n";
        $body = $boundaryStr;
        $body .= 'Content-Disposition: form-data; name="meta"' . "\r\n";
        $body .= 'Content-Type: application/json' . "\r\n";
        $body .= "\r\n";
        $body .= json_encode($meta, true) . "\r\n";
        $body .= $boundaryStr;
        $body .= 'Content-Disposition: form-data; name="file"; filename="' . $meta['filename'] . '"' . "\r\n";
        $mime_type = mime_content_type($file_url); //获取图片MIME类型
        $body .= 'Content-Type: ' . $mime_type . ';' . "\r\n";
        $body .= "\r\n";
        $body .= (fread(fopen($file_url, 'rb'), filesize($file_url))) . "\r\n";
        $body .= "--{$boundary}--\r\n";
        $content = Tools::post($this->base . $path, $body, ['headers' => $header]);
        return json_decode($content, true);
    }

    // ----------------------------------------------------------------
    // 分账处理
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
