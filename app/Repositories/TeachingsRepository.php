<?php
namespace App\Repositories;

use App\Helpers\TeachingsHelper;
use App\Models\Teachings;

class TeachingsRepository extends Repository
{
    public function init()
    {
        $this->model = new Teachings();
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
        
        $item->course_id = (int)$data['course_id'];
        $item->title = !empty($data['title']) ? $data['title'] : '';
        $item->summary = !empty($data['summary']) ? TeachingsHelper::inputContents($data['summary']) : '';
        $item->image = !empty($data['image']) ? $data['image'] : '';
        $item->display_type = !empty($data['display_type']) ? (int)$data['display_type'] : 1;
        $item->sort = (int)$data['sort'];
        $item->class_number = !empty($data['class_number']) ? (int)$data['class_number'] : 1;
        $item->status = 1;
        
        $item->save();
        
        return $item;
    }
    
    /**
     * 修改
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\BasicModel
     */
    public function update($id, $data = [])
    {
        $data['summary'] = !empty($data['summary']) ? TeachingsHelper::inputContents($data['summary']) : '';
        
        return parent::update($id, $data);
    }
}