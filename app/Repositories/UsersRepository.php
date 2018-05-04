<?php
namespace App\Repositories;

use App\Constants\Dictionary;
use App\Models\Users;

class UsersRepository extends Repository
{
    public $userType;
    
    public function init()
    {
        $this->model = new Users();
        
        $this->userType = Dictionary::USER_TYPE['admin'];
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
        
        $profile->username  = !empty($data['username']) ? $data['username'] : '';
        $profile->gender    = !empty($data['gender']) ? $data['gender'] : '';
        $profile->mobile    = !empty($data['mobile']) ? $data['mobile'] : '';
        $profile->email     = !empty($data['email']) ? $data['email'] : '';
        $profile->address   = !empty($data['address']) ? $data['address'] : '';
        
        $item->username = $profile->mobile;
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
        
        //使用手机号登录
        $item->username = $profile->mobile;
        
        $item->save();
        $profile->save();
        
        return $item;
    }
}