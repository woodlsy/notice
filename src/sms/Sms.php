<?php

namespace woodlsy\notice\sms;

use woodlsy\notice\sms\aliyun\AliyunSendSms;

class Sms
{
    public $obj = null;

    /**
     * 设置密钥
     *
     * @author woodlsy
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return $this
     */
    public function setAliyunAccessKey(string $accessKeyId, string $accessKeySecret)
    {
        $this->obj = (new AliyunSendSms());
        $this->obj->setAccessKey($accessKeyId, $accessKeySecret);
        return $this;
    }

    /**
     * 发送短信
     *
     * @author woodlsy
     * @param string $mobile
     * @param string $templateCode
     * @param string $templateParam
     * @param string $signName
     * @return mixed
     */
    public function aliyunSmsSend(string $mobile, string $templateCode, string $templateParam, string $signName)
    {
        return $this->obj->send($mobile, $templateCode, $templateParam, $signName);
    }
}