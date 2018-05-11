<?php
namespace App\Repositories;

use App\Constants\Dictionary;
use App\Models\Users;
use App\Models\Sms;

class UsersRepository extends Repository
{
    public $userType;
    
    public function init()
    {
        $this->model = new Users();
        
        $this->userType = Dictionary::USER_TYPE['admin'];
    }
    
    public function login($loginname, $params = [])
    {
        //验证验证码
        $verify = $this->verifycode($params['username'], $params['verifycode']);
        if (true !== $verify)
        {
            return ['验证码错误'];
        }
        
        $this->model = $this->model->where('username', $loginname)->first();
        if (empty($this->model))
        {
            return ['手机号错误'];
        }
        
        $result = $this->verify($params);
        
        return $result;
    }
    
    protected function verify($params)
    {
        $result = [];
        switch ($this->model->user_type)
        {
            //管理员
            case Dictionary::USER_TYPE['admin']:
                $result = $this->verifyAdmin($params);
                break;
                //分馆
            case Dictionary::USER_TYPE['branch']:
                $result = $this->verifyBranch($params);
                break;
                //教练
            case Dictionary::USER_TYPE['trainer']:
                $result = $this->verifyTrainer($params);
                break;
            default:
                break;
        }
        
        return $result;
    }
    
    protected function verifyAdmin($params)
    {
        return $this->model;
    }
    
    protected function verifyTrainer($params)
    {
        return $this->verifyBranch($params);
    }
    
    protected function verifyBranch($params)
    {
        $result = [];
        if ($this->model->restrict_value !== $params['mac_token'])
        {
            $result = ['不允许此电脑登录'];
        }
        
        return $result;
    }
    
    /**
     * 验证验证码
     * 
     * @param string $mobile
     * @param int $code
     * @return boolean
     */
    protected function verifycode($mobile, $code)
    {
        $end = time();
        $start = $end - Dictionary::VERIFYCODE_TIME;
        $end = date('Y-m-d H:i:s', $end);
        $start = date('Y-m-d H:i:s', $start);
        
        $message = Sms::where('mobile', $mobile)
                    ->whereBetween('created_at', [
                        $start, $end
                    ])->value('message');
        
        return $message === $code;
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
        
        $profile = $item->user_profile;
        
        //分馆 & 教练 公共信息
        $profile->username  = !empty($data['username']) ? $data['username'] : '';
        $profile->gender    = !empty($data['gender']) ? $data['gender'] : '';
        $profile->mobile    = !empty($data['mobile']) ? $data['mobile'] : '';
        $profile->email     = !empty($data['email']) ? $data['email'] : '';
        $profile->address   = !empty($data['address']) ? $data['address'] : '';
        
        //分馆 私有信息
        if (!empty($data['birthday']))
        {
            $profile->birthday = $data['birthday'];
        }
        if (!empty($data['expiry_date']))
        {
            $profile->expiry_date = $data['expiry_date'];
        }
        if (!empty($data['city']))
        {
            $profile->city = $data['city'];
        }
        if (!empty($data['id_number']))
        {
            $profile->id_number = $data['id_number'];
        }
        if (!empty($data['investment_amount']))
        {
            $profile->investment_amount = $data['investment_amount'];
        }
        
        //设置登录名
        $item->username = $this->loginname($profile);
        
        $item->user_type = $this->userType;
        $item->status = 0;
        
        if ($item->save())
        {
            $profile->user_id   = $item->id;
            $profile->save();
        }
        
        return $item;
    }
    
    /**
     * 修改
     *
     * @param int $id
     * @param array $data
     */
    public function update($id, $data = [])
    {
        $item = $this->model->find($id);
        $itemAtt = $item->getAttributes();
        
        $profile = $item->user_profile;
        $profileAtt = $profile->getAttributes();
        
        foreach ($data as $key => $value)
        {
            if (key_exists($key, $itemAtt))
            {
                $item->$key = $value;
            }
            
            if (key_exists($key, $profileAtt))
            {
                $profile->$key = $value;
            }
        }
        
        //设置登录名
        $item->username = $this->loginname($profile);
        
        $item->save();
        $profile->save();
        
        return $item;
    }
    
    /**
     * 采用用户某项基本信息用作登录名
     * 
     * @param Model $profile
     * @return string
     */
    public function loginname($profile)
    {
        $loginname = '';
        $attributes = $profile->getAttributes();
        if (key_exists(Dictionary::USER_PROFILE_KEY_FOR_LOGIN, $attributes))
        {
            $loginname = $profile->$key;
        }
        return $loginname;
    }
}