<?php

namespace App\Constants;

class Dictionary
{
    const ACCOUNT_TYPE = [
        'ADMINISTRATOR' => 1,//超给级管理员
        'EDITOR' => 2,//普通管理员
        'TEACHER' => 3,//教练
    ];
    
    const FILE_TYPE = [
        'COURSEWARE' => 'courseware', //课件
        'WEBSITE' => 'website', //官网
    ];
    
    const PAGE_SIZE = 10;//页容量
    
    //短信服务:阿里云
    const SMS_ALIYUN = [
        'ACCESS_KEY_ID' => 'LTAIyxMKvzGU1HvX',
        'ACCESS_KEY_SECRET' => '4tQmdBayLYtWATHeo9gealY9BM96DW',
        'SIGN_NAME' => '阿里云短信测试专用',
        'TEMPLATE_CODE' => 'SMS_135005007',
    ];
    
    const USER_PROFILE_KEY_FOR_LOGIN = 'mobile';
    
    const USER_TYPE = [
        'admin' => 1,//管理员
        'branch' => 2,//分馆
        'trainer' => 3,//教练
    ];
    
    const VERIFYCODE_TIME = 120;//验证码有效期(秒)
}
