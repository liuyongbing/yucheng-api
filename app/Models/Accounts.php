<?php

namespace App\Models;

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
    
    protected $appends = ['account', 'account_type', 'account_type_desc', 'status_desc'];
    
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
}
