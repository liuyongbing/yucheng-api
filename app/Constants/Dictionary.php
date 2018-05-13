<?php

namespace App\Constants;

class Dictionary
{
    const PAGE_SIZE = 10;//页容量
    
    const FILE_TYPE = [
        'COURSEWARE' => 'courseware', //课件
    ];
    
    const USER_TYPE = [
        'admin' => 1,//管理员
        'branch' => 2,//分馆
        'trainer' => 3,//教练
    ];
    
    const ACCOUNT_TYPE = [
        'ADMINISTRATOR' => 1,//超给级管理员
        'EDITOR' => 2,//普通管理员
        'TEACHER' => 3,//教练
    ];
    
    const USER_PROFILE_KEY_FOR_LOGIN = 'mobile';
    
    const VERIFYCODE_TIME = 120;//验证码有效期(秒)
}
