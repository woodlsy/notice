<?php
namespace woodlsy\notice\sms\aliyun;

use woodlsy\httpClient\HttpCurl;

class AliyunSendSms extends Config
{
    /**
     * 发送短信
     *
     * @author woodlsy
     * @param string $mobile
     * @param string $templateCode
     * @param string $templateParam
     * @param string $signName
     * @return string
     * @throws \woodlsy\httpClient\HttpClientException
     */
    public function send(string $mobile, string $templateCode, string $templateParam, string $signName)
    {
        $this->params['Action'] = 'SendSms';
        $this->params['PhoneNumbers'] = $mobile;
        $this->params['SignName'] = $signName;
        $this->params['TemplateCode'] = $templateCode;
        $this->params['TemplateParam'] = $templateParam;
        $this->params['Signature'] = $this->sign($this->params, 'POST');

        return (new HttpCurl())->setUrl($this->sendSmsUrl)->setData($this->params)->get();
    }

    /**
     * 设置密钥
     *
     * @author woodlsy
     * @param string $accessKeyId
     * @param string $accessKeySecret
     */
    public function setAccessKey(string $accessKeyId, string $accessKeySecret)
    {
        $this->accessKeyId = $accessKeyId;
        $this->accessKeySecret = $accessKeySecret;
    }

    /**
     * 加密
     *
     * @author woodlsy
     * @param array  $params
     * @param string $method
     * @return string
     */
    protected function sign(array $params, string $method) : string
    {
        ksort($params);
        $params = http_build_query($params);
        $content =$method.'&%2F&'.rawurlencode($params);

        return base64_encode(hash_hmac('sha1', $content, $this->accessKeySecret.'&', true));
    }
}