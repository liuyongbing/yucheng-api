<?php

namespace App\Models;

class WechatOauth extends BasicModel
{
    protected $table = 'wechat_oauth';
    
    protected $fillable = ['openid', 'original'];
}
