<?php

namespace AliPay;

use WeChat\Contracts\BasicAliPay;

/**
 * 订单分账
 * Class ProfitSharing
 * @package AliPay
 * @auther xhh
 */
class ProfitSharing extends BasicAliPay
{
    /**
     * 占位
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function apply($options)
    {
        return false;
    }

    // ----------------------------------------------------------------
    
    /**
     * 分账关系绑定
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function relationBind($options)
    {
        $this->options->set('method', 'alipay.trade.royalty.relation.bind');
        return $this->getResult($options);
    }

    /**
     * 分账关系解绑
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function relationUnbind($options)
    {
        $this->options->set('method', 'alipay.trade.royalty.relation.unbind');
        return $this->getResult($options);
    }

    /**
     * 分账关系查询
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function relationBatchquery($options)
    {
        $this->options->set('method', 'alipay.trade.royalty.relation.batchquery');
        return $this->getResult($options);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * 分账比例查询
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function settleRateQuery($options)
    {
        $this->options->set('method', 'alipay.trade.royalty.rate.query');
        return $this->getResult($options);
    }

    /**
     * 统一收单确认结算接口
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function settleConfirm($options)
    {
        $this->options->set('method', 'alipay.trade.settle.confirm');
        return $this->getResult($options);
    }

    /**
     * 统一收单交易结算接口
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function settle($options)
    {
        $this->options->set('method', 'alipay.trade.order.settle');
        return $this->getResult($options);
    }

    /**
     * 交易分账查询接口
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function settleQuery($options)
    {
        $this->options->set('method', 'alipay.trade.order.settle.query');
        return $this->getResult($options);
    }

    /**
     * 分账剩余金额查询
     * @param array $options
     * @return array|bool
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     * @auther xhh
     * @date 2024-09-19 11:05
     */
    public function onsettleQuery($options)
    {
        $this->options->set('method', 'alipay.trade.order.onsettle.query');
        return $this->getResult($options);
    }
}