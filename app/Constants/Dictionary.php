<?php

namespace App\Constants;

use App\Constants\Traits\Position;

class Dictionary
{
    use Position;//Banner位
    
    const ACCOUNT_TYPE = [
        'ADMINISTRATOR'         => 1,//超给级管理员
        'EDITOR'                => 2,//普通管理员
        'TEACHER'               => 3,//教练
        'TEACHER_TAEKWONDO'     => 31,//教练:齐天大圣(跆拳道)
        'TEACHER_POCKETCAT'     => 32,//教练:口袋猫(舞蹈)
        'TEACHER_TOWN'          => 33,//教练:童画镇(绘画)
        'TEACHER_SKATING'       => 34,//教练:学会玩(轮滑)
        'TEACHER_BASKETBALL'    => 35,//教练:晓虎队(篮球)
    ];
    
    const FILE_TYPE = [
        'COURSEWARE' => 'courseware', //课件
        'WEBSITE' => 'website', //官网
    ];
    
    //品牌
    const BRAND = [
        1 => '齐天大圣',
        2 => '口袋猫',
        3 => '童画镇',
    ];
    
    //预算
    const BUDGET = [
        1 => '10 ~ 20万',
        2 => '20 ~ 50万',
        4 => '50 ~ 100万',
        8 => '100 ~ 200万',
        16 => '200 ~ 500万',
    ];
    
    const PAGE_SIZE = 10;//页容量
    
    //短信服务:阿里云
    const SMS_ALIYUN = [
        'SIGN_NAME' => '宜昌翼教教育科技有限公司',
        'TEMPLATE_CODE' => 'SMS_136050092',
    ];
    
    const TEAM_TYPES = [
        '1' => '管理团队',
        '2' => '教师团队',
    ];
    
    const USER_PROFILE_KEY_FOR_LOGIN = 'mobile';
    
    const USER_TYPE = [
        'admin' => 1,//管理员
        'branch' => 2,//分馆
        'trainer' => 3,//教练
    ];
    
    const VERIFYCODE_TIME = 120;//验证码有效期(秒)
}
