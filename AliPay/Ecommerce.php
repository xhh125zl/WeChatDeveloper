<?php

namespace AliPay;

use WeChat\Contracts\BasicAliPay;

/**
 * 支付宝直付通（商户进件）
 * @document https://opendocs.alipay.com/solution/0d3h79
 * Class Ecommerce
 * @package AliPay
 * @auther xhh
 */
class Ecommerce extends BasicAliPay
{
    /**
     * 占位
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function apply($options)
    {
        return false;
    }

    /**
     * 直付通/服务商二级商户创建预校验咨询
     * @document https://opendocs.alipay.com/solution/ff926f54_ant.merchant.expand.indirect.zft.consult
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function consult($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.consult');
        return $this->getResult($options);
    }

    /**
     * 直付通/服务商二级商户结算信息修改
     * @document https://opendocs.alipay.com/solution/ff926f54_ant.merchant.expand.indirect.zft.settlementmodify
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function settlementmodify($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.settlementmodify');
        return $this->getResult($options);
    }

    /**
     * 直付通/服务商个人商户限额升级
     * @document https://opendocs.alipay.com/solution/ff926f54_ant.merchant.expand.indirect.zft.upgrade
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function upgrade($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.upgrade');
        return $this->getResult($options);
    }

    /**
     * 直付通/服务商二级商户标准进件
     * @document https://opendocs.alipay.com/solution/ff926f54_ant.merchant.expand.indirect.zft.simplecreate
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function simplecreate($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.simplecreate');
        return $this->getResult($options);
    }
    
    /**
     * 直付通二级商户创建
     * @document https://opendocs.alipay.com/solution/ff926f54_ant.merchant.expand.indirect.zft.create
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function create($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.create');
        return $this->getResult($options);
    }

    /**
     * 直付通/服务商二级商户修改
     * @document https://opendocs.alipay.com/solution/ed9060c2_ant.merchant.expand.indirect.zft.modify
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function modify($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.modify');
        return $this->getResult($options);
    }

    /**
     * 直付通/服务商二级商户入驻进度查询
     * @document https://opendocs.alipay.com/solution/dfebf71b_ant.merchant.expand.indirect.zftorder.query
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function applyQuery($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zftorder.query');
        return $this->getResult($options);
    }

    /**
     * 直付通/服务商二级商户进件审核通过消息
     * @document https://opendocs.alipay.com/solution/df08b750_ant.merchant.expand.indirect.zft.passed
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function passed($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.passed');
        return $this->getResult($options);
    }

    /**
     * 直付通/服务商二级商户进件拒绝消息
     * @document https://opendocs.alipay.com/solution/df08b750_ant.merchant.expand.indirect.zft.rejected
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function rejected($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.rejected');
        return $this->getResult($options);
    }

    /**
     * 直付通二级商户作废
     * @document https://opendocs.alipay.com/solution/df08b750_ant.merchant.expand.indirect.zft.delete
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function delete($options)
    {
        $this->options->set('method', 'ant.merchant.expand.indirect.zft.delete');
        return $this->getResult($options);
    }
    
    // ----------------------------------------------------------------

    /**
     * 图片上传
     * @document https://opendocs.alipay.com/solution/d0814d9c_ant.merchant.expand.indirect.image.upload
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-12 9:27
     */
    public function uploadImage($file_url, $file_name = '')
    {
        $path_info = pathinfo($file_url);
        $ext = strtolower($path_info['extension']);

        // 没有定义图片名称的，则使用图片路径解析名称
        if (empty($file_name)) $file_name = $path_info['basename'];

        $this->options->set('method', 'ant.merchant.expand.indirect.image.upload');
        // 不能放到biz_content中，否则签名不过
        // 必须单独赋值，和放不放biz_content中没关系，否则签名不过
        $this->options->set('image_type', $ext);

        $file = curl_file_create($file_url, mime_content_type($file_url), $file_name);
        $other_options = [
            // 不参与签名数据
            'data' => [
                'image_content' => $file,
            ],
        ];
        return $this->postResult([], $other_options);
    }
}