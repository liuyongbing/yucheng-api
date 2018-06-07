<?php
namespace App\Repositories;

use App\Models\Banner;

class BannerRepository extends Repository
{
    public function init()
    {
        $this->model = new Banner();
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
        
        $item->position_id  = isset($data['position_id']) ? $data['position_id'] : '';
        $item->target       = isset($data['target']) ? $data['target'] : '';
        $item->url          = isset($data['url']) ? $data['url'] : '';
        $item->title        = isset($data['title']) ? $data['title'] : '';
        $item->image        = isset($data['image']) ? $data['image'] : '';
        $item->sort         = (int)$data['sort'];
        $item->status       = isset($data['status']) ? (int)$data['status'] : 0;
        
        $item->save();
        
        return $item;
    }
}