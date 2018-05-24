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
    public function login($username, $accountType, $params = [])
    {
        //验证验证码
        $smsRep = new SmsRepository();
        $verify = $smsRep->verify($username, $params['code']);
        if (true !== $verify)
        {
            return [
                'code' => '100000',
                'message' => '验证码错误'
            ];
        }
        
        $this->model = $this->model->where('username', $username)->first();
        if (empty($this->model))
        {
            return [
                'code' => '100000',
                'message' => '手机号错误'
            ];
        }
        
        if (!$this->model->status)
        {
            return [
                'code' => '100000',
                'message' => '账号已禁用'
            ];
        }
        
        $accountType = strtoupper($accountType);
        if (!isset(Dictionary::ACCOUNT_TYPE[$accountType]))
        {
            return [
                'code' => '100000',
                'message' => '不支持的账号类型'
            ];
        }
        
        $result = $this->verify($params, $accountType);
        
        return $result;
    }
    
    /**
     * 账号登录验证
     * 
     * @param array $params
     * @return array
     */
    protected function verify($params, $accountType)
    {
        $result = [];
        
        switch ($this->model->user_type)
        {
            //超级管理员
            case Dictionary::ACCOUNT_TYPE['ADMINISTRATOR']:
            //普通管理员
            case Dictionary::ACCOUNT_TYPE['EDITOR']:
                $result = $this->verifyAdmin($params, $accountType);
                break;
            //教练
            case Dictionary::ACCOUNT_TYPE['TEACHER']:
                $result = $this->verifyTeacher($params, $accountType);
                break;
            default:
                $result = [
                    'code' => '100000',
                    'message' => '暂不支持的用户类型'
                ];
                break;
        }
        
        return $result;
    }
    
    /**
     * 管理员登录
     */
    protected function verifyAdmin($params, $accountType)
    {
        $result = $this->model;
        if (!in_array(Dictionary::ACCOUNT_TYPE[$accountType], [
            Dictionary::ACCOUNT_TYPE['ADMINISTRATOR'],
            Dictionary::ACCOUNT_TYPE['EDITOR'],
        ]))
        {
            $result = [
                'code' => '100000',
                'message' => '账号类型不匹配'
            ];
        }
        
        return $result;
    }
    
    /**
     * 教练登录
     * 
     * @param array $params
     * @return array
     */
    protected function verifyTeacher($params, $accountType)
    {
        $result = $this->model;
        
        if ($this->model->user_type != Dictionary::ACCOUNT_TYPE[$accountType])
        {
            return [
                'code' => '100000',
                'message' => '账号类型不匹配'
            ];
        }
        
        if (empty($params['mac_token']))
        {
            return [
                'code' => '100000',
                'message' => '缺少电脑MAC地址参数, 请使用指定浏览器登录'
            ];
        }
        
        //教练第一次登录时,绑定第一次登录的电脑MAC地址
        if (empty($this->model->restrict_value))
        {
            $this->model->restrict_value = $params['mac_token'];
            $this->model->save();
        }
        
        if ($this->model->restrict_value !== $params['mac_token'])
        {
            $result = [
                'code' => '100000',
                'message' => '不允许此电脑登录'
            ];
        }
        
        return $result;
    }
}