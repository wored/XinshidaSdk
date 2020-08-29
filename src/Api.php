<?php

namespace Wored\XinshidaSdk;

use Hanson\Foundation\AbstractAPI;
use Hanson\Foundation\Log;

class Api extends AbstractAPI
{
    private $config;

    /**
     * Api constructor.
     * @param $appkey
     * @param $appsecret
     * @param $sid
     * @param $baseUrl
     */
    public function __construct(XinshidaSdk $xinshidaSdk)
    {
        $this->config = $xinshidaSdk->getConfig();
    }
    /**
     * api请求方法
     * @param $method域名后链接
     * @param $params账后相关参数以外请求参数
     * @return mixed
     * @throws \Exception
     */
    public function request(string $method, array $params)
    {
        $params['appid'] = $this->config['appid'];
        $params['sign'] = $this->sign($params);
        $url = $this->config['rooturl'] . $method;
        $http = $this->getHttp();
        $response = $http->json($url, $params);
        return json_decode(strval($response->getBody()), true);
    }
    /**
     * 生成签名
     * @param array $params请求的所有参数
     * @return string
     */
    public function sign(array $param)
    {
        unset($param['sign']);
        ksort($param);
        return md5(json_encode($param) . $this->config['appkey']);//加密生成签名
    }
}