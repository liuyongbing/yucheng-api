<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models attributes
    |--------------------------------------------------------------------------
    |
    */

    'grades' => [
        'title' => '标题',
        'status' => [
            0 => '无效',
            1 => '有效'
        ],
    ],
    'accounts' => [
        'user_type' => [
            1 => '超级管理员',
            2 => '管理员',
            3 => '教练',
        ],
    ],

];
