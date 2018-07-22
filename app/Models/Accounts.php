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
        
        switch ($this->user_type)
        {
            case 31:
                $brandId = 1;
                break;
            case 32:
                $brandId = 2;
                break;
            case 33:
                $brandId = 3;
                break;
            case 34:
                $brandId = 4;
                break;
            case 35:
                $brandId = 5;
                break;
            default:
                $brandId = 0;
                break;
        }
        
        return $brandId;
    }
}
