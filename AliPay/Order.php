<?php

namespace AliPay;

use WeChat\Contracts\BasicAliPay;

/**
 * 支付宝支付
 * Class Order
 * @package AliPay
 */
class Order extends BasicAliPay
{
    /**
     * 占位
     * @auther xhh
     * @date 2024-09-19 10:25
     */
    public function apply($options)
    {
        return false;
    }

    /**
     * app支付
     * @param array $options
     * @return string
     * @auther xhh
     * @date 2024-09-19 10:25
     */
    public function app($options)
    {
        $this->options->set('method', 'alipay.trade.app.pay');
        $this->params->set('product_code', 'QUICK_MSECURITY_PAY');
        $this->applyData($options);
        return http_build_query($this->options->get());
    }

    /**
     * 扫码支付
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 10:25
     */
    public function scan($options)
    {
        $this->options->set('method', 'alipay.trade.precreate');
        return $this->getResult($options);
    }
    
    /**
     * 刷卡支付
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 10:25
     */
    public function pos($options)
    {
        $this->options->set('method', 'alipay.trade.pay');
        $this->params->set('product_code', 'FACE_TO_FACE_PAYMENT');
        return $this->getResult($options);
    }

    /**
     * 手机WAP网站支付
     * @param array $options
     * @return string
     * @auther xhh
     * @date 2024-09-19 10:25
     */
    public function wap($options)
    {
        $this->options->set('method', 'alipay.trade.wap.pay');
        $this->params->set('product_code', 'QUICK_WAP_WAY');
        parent::applyData($options);
        return $this->buildPayHtml();
    }
    
    /**
     * 网站支付
     * @param array $options
     * @return string
     * @auther xhh
     * @date 2024-09-19 10:25
     */
    public function web($options)
    {
        $this->options->set('method', 'alipay.trade.page.pay');
        $this->params->set('product_code', 'FAST_INSTANT_TRADE_PAY');
        parent::applyData($options);
        return $this->buildPayHtml();
    }
}