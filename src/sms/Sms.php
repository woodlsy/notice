<?php
namespace woodlsy\notice\sms;

use woodlsy\notice\sms\aliyun\AliyunSendSms;

class Sms
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
    public function aliyunSmsSend(string $mobile, string $templateCode, string $templateParam, string $signName)
    {
        return (new AliyunSendSms())->send($mobile, $templateCode, $templateParam, $signName);
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
        (new AliyunSendSms())->setAccessKey($accessKeyId, $accessKeySecret);
    }
}