<?php

namespace App\Models;

use App\Constants\Dictionary;

class Accounts extends BasicModel
{
    protected $hidden = [
        'username',
        'user_type',
        'restrict_type',
        'restrict_value',
        'restrict_value_sub',
        'created_at',
        'updated_at',
    ];
    
    protected $appends = [
        'account',
        'account_type',
        'account_type_desc',
        'brand_id',
        'status_desc'
    ];
    
    public function getAccountAttribute()
    {
        return $this->username;
    }
    
    /**
     * 账号类型
     *
     * @return string
     */
    public function getAccountTypeAttribute()
    {
        return $this->user_type;
    }
    
    /**
     * 账号类型:文本
     *
     * @return string
     */
    public function getAccountTypeDescAttribute()
    {
        return trans('attributes.accounts.user_type.' . $this->user_type);
    }
    
    public function getBrandIdAttribute()
    {
        $brandId = 0;
        
        if (Dictionary::ACCOUNT_TYPE['TEACHER'] == $this->user_type)
        {
            //教练需要返回其所属品牌, 用于教练登录教学系统时, 自动识别其教学课件
            $member = Member::where('mobile', $this->username)->first();
            if (!empty($member))
            {
                $brandId = $member->brand_id;
            }
        }
        
        return $brandId;
    }
}
