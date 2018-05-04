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
    
    const USER_PROFILE_KEY_FOR_LOGIN = 'mobile';
}
