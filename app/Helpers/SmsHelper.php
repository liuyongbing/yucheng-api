<?php
namespace App\Helpers;

class SmsHelper
{
    public static function send($mobile, $message)
    {
        //TODO: 对接服务商发送短信
        $result = [
            'status' => 'success',
            '$mobile' => $mobile,
            '$message' => $message,
        ];
        return $result;
    }
}