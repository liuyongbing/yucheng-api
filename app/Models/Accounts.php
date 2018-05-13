<?php

namespace App\Models;

class Accounts extends Users
{
    protected $hidden = [
        'username',
        'restrict_type',
        'restrict_value',
        'restrict_value_sub',
        'created_at',
        'updated_at',
    ];
    
    protected $appends = ['account', 'account_type_desc', 'status_desc'];
    
    public function getAccountAttribute()
    {
        return $this->username;
    }
    
    /**
     * 状态:文本
     *
     * @return string
     */
    public function getStatusDescAttribute()
    {
        return trans('attributes.grades.status.' . $this->status);
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
