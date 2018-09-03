<?php
namespace App\Repositories;

use App\Models\WechatStudents;

class WechatStudentsRepository extends Repository
{
    public function init()
    {
        $this->model = new WechatStudents();
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
        
        $item->openid       = !empty($data['openid']) ? $data['openid'] : '';
        $item->student_id   = !empty($data['student_id']) ? $data['student_id'] : '';
        
        $item->save();
        
        return $item;
    }
    
    public function showByOpenid($openid)
    {
        return $this->model->where(['openid' => $openid])->first();
    }
}