<?php

namespace App\Models;

class Users extends BasicModel
{
    protected $table = 'users';
    
    protected $hidden = [
        'username',
        'restrict_type',
        'restrict_value',
        'restrict_value_sub',
        'created_at',
        'updated_at',
    ];
    
    protected $appends = ['account', 'status_desc', 'user_profile'];
    
    public function getAccountAttribute()
    {
        return $this->username;
    }
    
    /**
     * 用户信息
     *
     * @return string
     */
    public function getUserProfileAttribute()
    {
        return $this->userProfile();
    }
    
    public function userProfile()
    {
        $model = new UserProfiles();
        if (!empty($this->id)) {
            //TODO: find by user_id
            $model = $model->find($this->id);
        }
        return $model;
    }
}
