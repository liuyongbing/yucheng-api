<?php
namespace App\Repositories;

use App\Models\Courses;

class CoursesRepository extends Repository
{
    public function init()
    {
        return $this->model = new Courses();
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
}