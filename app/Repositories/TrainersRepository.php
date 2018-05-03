<?php
namespace App\Repositories;

use App\Models\Trainers;

class TrainersRepository extends Repository
{
    public function init()
    {
        return $this->model = new Trainers();
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
        
        $item->grade_id = (int)$data['grade_id'];
        $item->title  = !empty($data['title']) ? $data['title'] : '';
        $item->summary  = !empty($data['summary']) ? $data['summary'] : '';
        $item->image  = !empty($data['image']) ? $data['image'] : '';
        $item->sort   = (int)$data['sort'];
        $item->status = 1;
        
        $item->save();
        
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