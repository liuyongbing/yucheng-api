<?php
namespace App\Repositories;

use App\Helpers\SectionHelper;
use App\Models\Section;

class SectionRepository extends Repository
{
    public function init()
    {
        $this->model = new Section();
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
        
        $item->page_id  = isset($data['page_id']) ? $data['page_id'] : '';
        $item->code     = isset($data['code']) ? $data['code'] : '';
        $item->title    = !empty($data['title']) ? $data['title'] : '';
        $item->contents = SectionHelper::inputContents($data['contents']);
        $item->sort     = (int)$data['sort'];
        $item->status   = isset($data['status']) ? (int)$data['status'] : 0;
        
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
        $item = $this->model->find($id);
        $attributes = $item->getAttributes();
        
        $data['contents'] = SectionHelper::inputContents($data['contents']);
        
        foreach ($data as $key => $value)
        {
            if (key_exists($key, $attributes))
            {
                $item->$key = $value;
            }
        }
        
        $item->save();
        
        return $item;
    }
}