<?php

namespace woodlsy\notice\sms\aliyun;

class Config
{
    protected $sendSmsUrl = 'https://dysmsapi.aliyuncs.com'; // 请求签名

    protected $accessKeyId = 'AccessKeyId'; // 访问密钥ID

    protected $accessKeySecret = 'accessKeySecret'; // 密钥

    protected $signatureMethod = 'HMAC-SHA1'; // 签名方式

    protected $signatureVersion = '1.0'; // 签名算法版本

    protected $timestamp = null;

    protected $version = '2017-05-25'; // API 的版本号

    protected $params = [];

    public function __construct()
    {
        $this->setTimestamp();
        $this->setPublicParams();
    }

    private function setTimestamp()
    {
        $this->timestamp = gmDate("Y-m-d\TH:i:s\Z");
    }

    /**
     * 设置公共参数
     *
     * @author woodlsy
     */
    protected function setPublicParams()
    {
        $this->params = [
            'AccessKeyId'      => $this->accessKeyId,
            'Format'           => 'json',
            'SignatureMethod'  => $this->signatureMethod,
            'SignatureNonce'   => uniqid('', true),
            'SignatureVersion' => $this->signatureVersion,
            'Timestamp'        => $this->timestamp,
            'Version'          => $this->version,
        ];
    }

}