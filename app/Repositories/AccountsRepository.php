<?php
namespace App\Repositories;

use App\Constants\Dictionary;
use App\Models\Accounts;

/**
 * 账号 repository
 * 
 */
class AccountsRepository extends Repository
{
    public function init()
    {
        $this->model = new Accounts();
    }
    
    /**
     * 新增
     *
     * @param array $data
     * @return \App\Models\BasicModel
     */
    public function store($data)
    {
        $item = $this->model;
        
        $item->username = $data['username'];
        $item->user_type = $data['user_type'];
        $item->status = 1;
        
        $item->save();
        
        return $item;
    }
    
    /**
     * 登录
     */
    public function login($username, $params = [])
    {
        //验证验证码
        $smsRep = new SmsRepository();
        $verify = $smsRep->verifycode($params['username'], $params['code']);
        if (true !== $verify)
        {
            return ['验证码错误'];
        }
        
        $this->model = $this->model->where('username', $username)->first();
        if (empty($this->model))
        {
            return ['手机号错误'];
        }
        
        if (!$this->model->status)
        {
            return ['账号已禁用'];
        }
        
        $result = $this->verify($params);
        
        return $result;
    }
    
    /**
     * 账号登录验证
     * {@inheritDoc}
     * @param array $params
     * @return array
     */
    protected function verify($params)
    {
        $result = [];
        switch ($this->model->user_type)
        {
            //超级管理员
            case Dictionary::ACCOUNT_TYPE['ADMINISTRATOR']:
            //普通管理员
            case Dictionary::ACCOUNT_TYPE['EDITOR']:
                $result = $this->verifyAdmin($params);
                break;
            //教练
            case Dictionary::USER_TYPE['TEACHER']:
                $result = $this->verifyTeacher($params);
                break;
            default:
                break;
        }
        
        return $result;
    }
    
    /**
     * 管理员登录
     */
    protected function verifyAdmin($params)
    {
        return $this->model;
    }
    
    /**
     * 教练登录
     * 
     * @param array $params
     * @return array
     */
    protected function verifyTeacher($params)
    {
        $result = [];
        if (empty($params['mac_token']))
        {
            $result = ['缺少电脑MA地址参数, 请使用指定浏览器登录'];
        }
        
        //教练第一次登录时,绑定第一次登录的电脑MAC地址
        if (empty($this->model->restrict_value)
        {
            $this->model->restrict_value = $params['mac_token'];
            $this->model->save;
        }
        
        if ($this->model->restrict_value !== $params['mac_token'])
        {
            $result = ['不允许此电脑登录'];
        }
        
        return $result;
    }
}