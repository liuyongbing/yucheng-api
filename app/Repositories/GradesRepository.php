<?php
namespace App\Repositories;

use App\Models\Grades;

class GradesRepository extends Repository
{
    public function init()
    {
        $this->model = new Grades();
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
        
        $item->brand_id  = !empty($data['brand_id']) ? (int)$data['brand_id'] : 0;
        $item->title     = !empty($data['title']) ? $data['title'] : '';
        $item->image     = !empty($data['image']) ? $data['image'] : '';
        $item->sort      = (int)$data['sort'];
        $item->status    = 1;
        
        $item->save();
        
        return $item;
    }
}