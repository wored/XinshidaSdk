<?php

namespace Wored\XinshidaSdk;


use Hanson\Foundation\Foundation;

/***
 * Class XinshidaSdk
 * @package \Wored\XinshidaSdk
 *
 * @property \Wored\XinshidaSdk\Api $api
 */
class XinshidaSdk extends Foundation
{
    protected $providers = [
        ServiceProvider::class
    ];

    public function __construct($config)
    {
        $config['debug'] = $config['debug'] ?? false;
        parent::__construct($config);
    }

    /**
     * 推送物流
     * @param string $order_sn 订单号
     * @param string $waybill_number 运单号
     * @param string $shipping_code 物流企业代码
     * @param string $shipping_name 物流名称
     * @return mixed
     * @throws \Exception
     */
    public function waybill(string $order_sn, string $waybill_number, string $shipping_code, string $shipping_name)
    {
        $params = [
            'order_sn'       => $order_sn,
            'waybill_number' => $waybill_number,
            'shipping_code'  => $shipping_code,
            'shipping_name'  => $shipping_name,
        ];
        return $this->api->request('/Grabbed/index/waybill.html',$params);
    }

    /**
     * 验证签名，签名正确返回布尔true，否则返回false
     * @param array $param
     * @return bool
     */
    public function verifySign(array $param)
    {
        $sign = $param['sign'];
        if ($this->api->sign($param) == $sign) {
            return true;
        } else {
            return false;
        }
    }
}