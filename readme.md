# WeChatDeveloper for PHP

* 基于 [WeChatDeveloper](https://github.com/zoujingli/WeChatDeveloper) 优化并完善；
* 添加并修改自用的内容，方便使用
* 基础的使用文档请参考原始的WeChatDeveloper文档

技术帮助
----
WeChatDeveloper 是基于官方接口封装，在做微信开发前，必需先阅读微信官方文档。

* 微信官方文档：https://mp.weixin.qq.com/wiki
* 商户支付文档：https://pay.weixin.qq.com/wiki/doc/api/index.html

针对 WeChatDeveloper 也有一准备了帮助资料可供参考。

* WeChatDeveloper：https://www.kancloud.cn/zoujingli/wechat-developer

文件说明（后续会根据官方文档增加文件）
----

| 文件名               | 类名                  | 描述           | 类型    | 加载 ①                      |
|-------------------|---------------------|--------------|-------|---------------------------|
| App.php           | AliPay\App          | 支付宝App支付     | 支付宝支付 | \We::AliPayApp()          |
| Bill.php          | AliPay\Bill         | 支付宝账单下载      | 支付宝支付 | \We::AliPayBill()         |
| Pos.php           | AliPay\Pos          | 支付宝刷卡支付      | 支付宝支付 | \We::AliPayPos()          |
| Scan.php          | AliPay\Scan         | 支付宝扫码支付      | 支付宝支付 | \We::AliPayScan()         |
| Transfer.php      | AliPay\Transfer     | 支付宝转账        | 支付宝支付 | \We::AliPayTransfer()     |
| Wap.php           | AliPay\Wap          | 支付宝Wap支付     | 支付宝支付 | \We::AliPayWap()          |
| Web.php           | AliPay\Web          | 支付宝Web支付     | 支付宝支付 | \We::AliPayWeb()          |
| Card.php          | WeChat\Card         | 微信卡券接口支持     | 认证服务号 | \We::WeChatCard()         |
| Custom.php        | WeChat\Custom       | 微信客服消息接口支持   | 认证服务号 | \We::WeChatCustom()       |
| Media.php         | WeChat\Media        | 微信媒体素材接口支持   | 认证服务号 | \We::WeChatMedia()        |
| Oauth.php         | WeChat\Oauth        | 微信网页授权消息类接口  | 认证服务号 | \We::WeChatOauth()        |
| Pay.php           | WeChat\Pay          | 微信支付类接口      | 认证服务号 | \We::WeChatPay()          |
| Product.php       | WeChat\Product      | 微信商店类接口      | 认证服务号 | \We::WeChatProduct()      |
| Qrcode.php        | WeChat\Qrcode       | 微信二维码接口支持    | 认证服务号 | \We::WeChatQrcode()       |
| Receive.php       | WeChat\Receive      | 微信推送事件消息处理支持 | 认证服务号 | \We::WeChatReceive()      |
| Scan.php          | WeChat\Scan         | 微信扫一扫接口支持    | 认证服务号 | \We::WeChatScan()         |
| Script.php        | WeChat\Script       | 微信前端JSSDK支持  | 认证服务号 | \We::WeChatScript()       |
| Shake.php         | WeChat\Shake        | 微信蓝牙设备揺一揺接口  | 认证服务号 | \We::WeChatShake()        |
| Tags.php          | WeChat\Tags         | 微信粉丝标签接口支持   | 认证服务号 | \We::WeChatTags()         |
| Template.php      | WeChat\Template     | 微信模板消息接口支持   | 认证服务号 | \We::WeChatTemplate()     |
| User.php          | WeChat\User         | 微信粉丝管理接口支持   | 认证服务号 | \We::WeChatCard()         |
| Wifi.php          | WeChat\Wifi         | 微信门店WIFI管理支持 | 认证服务号 | \We::WeChatWifi()         |
| Draft.php         | WeChat\Draft        | 微信草稿箱        | 认证服务号 | \We::WeChatDraft()        |
| Freepublish.php   | WeChat\Freepublish  | 微信发布能力       | 认证服务号 | \We::WeChatFreepublish()  |
| Bill.php          | WePay\Bill          | 微信商户账单及评论    | 微信支付  | \We::WePayBill()          |
| Coupon.php        | WePay\Coupon        | 微信商户代金券      | 微信支付  | \We::WePayCoupon()        |
| Order.php         | WePay\Order         | 微信商户订单       | 微信支付  | \We::WePayOrder()         |
| Redpack.php       | WePay\Redpack       | 微信红包支持       | 微信支付  | \We::WePayRedpack()       |
| Refund.php        | WePay\Refund        | 微信商户退款       | 微信支付  | \We::WePayRefund()        |
| Transfers.php     | WePay\Transfers     | 微信商户打款到零钱    | 微信支付  | \We::WePayTransfers()     |
| TransfersBank.php | WePay\TransfersBank | 微信商户打款到银行卡   | 微信支付  | \We::WePayTransfersBank() |
| Crypt.php         | WeMini\Crypt        | 微信小程序数据加密处理  | 微信小程序 | \We::WeMiniCrypt()        |
| Plugs.php         | WeMini\Plugs        | 微信小程序插件管理    | 微信小程序 | \We::WeMiniPlugs()        |
| Poi.php           | WeMini\Poi          | 微信小程序地址管理    | 微信小程序 | \We::WeMiniPoi()          |
| Qrcode.php        | WeMini\Qrcode       | 微信小程序二维码管理   | 微信小程序 | \We::WeMiniCrypt()        |
| Template.php      | WeMini\Template     | 微信小程序模板消息支持  | 微信小程序 | \We::WeMiniTemplate()     |
| Total.php         | WeMini\Total        | 微信小程序数据接口    | 微信小程序 | \We::WeMiniTotal()        |

安装使用
----
1.1 通过 Composer 来管理安装

```shell
# 首次安装 线上版本（稳定）
composer require xhh125zl/wechat-developer

# 首次安装 开发版本（开发）
composer require xhh125zl/wechat-developer dev-master

# 更新 WeChatDeveloper
composer update xhh125zl/wechat-developer
```

1.2 如果不使用 Composer， 可以下载 WeChatDeveloper 并解压到项目中

```php
# 在项目中加载初始化文件
include "您的目录/WeChatDeveloper/include.php";
```

2.1 接口实例所需参数

```php
$config = [
    'token'          => 'test',
    'appid'          => 'wx60a43dd8161666d4',
    'appsecret'      => '71308e96a204296c57d7cd4b21b883e8',
    'encodingaeskey' => 'BJIUzE0gqlWy0GxfPp4J1oPTBmOrNDIGPNav1YFH5Z5',
    // 配置商户支付参数（可选，在使用支付功能时需要）
    'mch_id'         => "1235704602",
    'mch_key'        => 'IKI4kpHjU94ji3oqre5zYaQMwLHuZPmj',
    // 配置商户支付双向证书目录（可选，在使用退款|打款|红包时需要）
    'ssl_key'        => '',
    'ssl_cer'        => '',
    // 缓存目录配置（可选，需拥有读写权限）
    'cache_path'     => '',
];
```

3.1 实例指定接口

```php
try {

    // 实例对应的接口对象
    $user = new \WeChat\User($config);
    
    // 调用接口对象方法
    $list = $user->getUserList();
    
    // 处理返回的结果
    echo '<pre>';
    var_export($list);
    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo $e->getMessage() . PHP_EOL;
    
}
```

微信支付
---

```php
  // 创建接口实例
  $wechat = new \WeChat\Pay($config);
  
  // 组装参数，可以参考官方商户文档
  $options = [
      'body'             => '测试商品',
      'out_trade_no'     => time(),
      'total_fee'        => '1',
      'openid'           => 'o38gpszoJoC9oJYz3UHHf6bEp0Lo',
      'trade_type'       => 'JSAPI',
      'notify_url'       => 'http://a.com/text.html',
      'spbill_create_ip' => '127.0.0.1',
  ];
    
try {

    // 生成预支付码
    $result = $wechat->createOrder($options);
    
    // 创建JSAPI参数签名
    $options = $wechat->createParamsForJsApi($result['prepay_id']);
    
    // @todo 把 $options 传到前端用js发起支付就可以了
    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo $e->getMessage() . PHP_EOL;
    
}
```

* 更多功能请阅读测试代码或SDK封装源码

支付宝支付
----

* 支付参数配置（可用沙箱模式）

```php
$config = [
    // 沙箱模式
    'debug'            => true,
    // 签名类型 ( RSA|RSA2 )
    'sign_type'        => 'RSA2',
    // 应用ID
    'appid'            => '2021000122667306',
    // 应用私钥内容 ( 需1行填写，特别注意：这里的应用私钥通常由支付宝密钥管理工具生成 )
    'private_key'      => 'MIIEowIBAAKCAQEAn...',
    // 公钥模式，支付宝公钥内容 ( 需1行填写，特别注意：这里不是应用公钥而是支付宝公钥，通常是上传应用公钥换取支付宝公钥，在网页可以复制 )
    'public_key'       => '',
    // 证书模式，应用公钥证书路径 ( 新版资金类接口转 app_cert_sn，如文件 appCertPublicKey.crt )
    'app_cert_path'    => __DIR__ . '/alipay/appPublicCert.crt', // 'app_cert' => '证书内容',
    // 证书模式，支付宝根证书路径 ( 新版资金类接口转 alipay_root_cert_sn，如文件 alipayRootCert.crt )
    'alipay_root_path' => __DIR__ . '/alipay/alipayRootCert.crt', // 'root_cert' => '证书内容',
    // 证书模式，支付宝公钥证书路径 ( 未填写 public_key 时启用此参数，如文件 alipayPublicCert.crt )
    'alipay_cert_path' => __DIR__ . '/alipay/alipayPublicCert.crt', // 'public_key' => '证书内容'
    // 支付成功通知地址
    'notify_url'       => '',
    // 网页支付回跳地址
    'return_url'       => '',
];
```

* 支付宝发起PC网站支付

```php
// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = 'http://pay.thinkadmin.top/test/alipay-notify.php';
$config['return_url'] = 'http://pay.thinkadmin.top/test/alipay-success.php';

try {
    
    // 实例支付对象
    $pay = We::AliPayWeb($config);
    // $pay = new \AliPay\Web($config);
    
    // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.page.pay
    $result = $pay->apply([
        'out_trade_no' => time(), // 商户订单号
        'total_amount' => '1',    // 支付金额
        'subject'      => '支付订单描述', // 支付订单描述
    ]);
    
    echo $result; // 直接输出HTML（提交表单跳转)
    
} catch (Exception $e) {

    // 异常处理
    echo $e->getMessage();
    
}
```

* 支付宝发起手机网站支付

```php
// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = 'http://pay.thinkadmin.top/test/alipay-notify.php';
$config['return_url'] = 'http://pay.thinkadmin.top/test/alipay-success.php';

try {

    // 实例支付对象
    $pay = We::AliPayWap($config);
    // $pay = new \AliPay\Wap($config);

    // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.wap.pay
    $result = $pay->apply([
        'out_trade_no' => time(), // 商户订单号
        'total_amount' => '1',    // 支付金额
        'subject'      => '支付订单描述', // 支付订单描述
    ]);

    echo $result; // 直接输出HTML（提交表单跳转)

} catch (Exception $e) {

    // 异常处理
    echo $e->getMessage();

}
```

* 更多功能请阅读测试代码或SDK封装源码

## 版权说明

**WeChatDeveloper** 遵循 **MIT** 开源协议发布，并免费提供使用。

本项目包含的第三方源码和二进制文件的版权信息将另行标注，请在对应文件查看。

版权所有 Copyright © 2014-2023 by ThinkAdmin (https://thinkadmin.top) All rights reserved。
