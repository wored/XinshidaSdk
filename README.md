<h1 align="center">欣士达SDK</h1>

## 安装

```shell
$ composer require wored/xinshida-sdk -vvv
```

## 使用
```php
<?php
use \Wored\XinshidaSdk\XinshidaSdk;

$config = [
    'appid'   => '1000001',
    'appkey'  => '1cc93b278bbf23695dd86a395a486a82',
    'rooturl' => 'http://api.eyomart.com'
];
//欣士达SDK
$xinshida = new XinshidaSdk($config);
//验签
$param = '{"actiontime":1598517927,"add_time":"1527031572","address":"地铁1号线","appid":1000001,"city":"重庆","consignee":"李逵","customcode":"50073608EH","customname":"重庆双击科技有限公司","district":"九龙坡区","nric":"51013019641234567X","order_amount":"916.44","order_goods":[{"goods_name":"澳洲爱他美Aptamil白金版 3段 900g","supplies_sn":"NZL001007","goods_price":"140.00","goods_attr_name":"6罐装","goods_attr_number":"6","term":"2020-12/2020-12","goods_costprice":"130.00"}],"order_sn":"1200827150900395991","pay_card":"51013019641234567X","pay_name":"支付宝支付","pay_tel":"13911111111","pay_time":"1527041572","pay_user":"李逵","paycompanycode":"312228034T","paycompanyname":"通联支付网络服务股份有限公司","payment_trade_sn":"11185900000040","province":"重庆","shipping_fee":"0.00","tax_amount":"76.44","tel":"13911111111","sign":"e7ed3ecca2d15b5e0be2fb403177bd2e"}';
$param=json_decode($param,true);
$ret = $xinshida->verifySign($param);//验签
//推送物流
$ret = $xinshida->waybill('45646565','555522001','yunda','韵达快递');
```
## License

MIT