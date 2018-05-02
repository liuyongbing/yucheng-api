<?php
namespace App\Repositories;

use App\Models\Teachings;

class TeachingsRepository extends Repository
{
    public function getModel()
    {
        return new Teachings();
    }
    
    /**
     * 新增
     *
     * @param array $data
     * @return \App\Models\BasicModel
     */
    public function store($data)
    {
        $item = $this->getModel();
        
        $item->course_id = (int)$data['course_id'];
        $item->title  = !empty($data['title']) ? $data['title'] : '';
        $item->summary  = !empty($data['summary']) ? $data['summary'] : '';
        $item->image  = !empty($data['image']) ? $data['image'] : '';
        $item->display_type   = !empty($data['display_type']) ? (int)$data['display_type'] : 1;
        $item->sort   = (int)$data['sort'];
        $item->status = 1;
        
        $item->save();
        
        return $item;
    }
}