<?php
namespace App\Repositories;

use App\Helpers\NewsHelper;
use App\Models\Apply;

class ApplyRepository extends Repository
{
    public function init()
    {
        $this->model = new Apply();
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
        
        $item->brand_id = (int)$data['brand_id'];
        $item->username = !empty($data['username']) ? $data['username'] : '';
        $item->mobile = !empty($data['mobile']) ? $data['mobile'] : '';
        $item->budget_range = isset($data['budget_range']) ? (int)$data['budget_range'] : 0;
        $item->province = !empty($data['province']) ? $data['province'] : '';
        $item->city = !empty($data['city']) ? $data['city'] : '';
        $item->area = !empty($data['area']) ? $data['area'] : '';
        $item->address = !empty($data['address']) ? $data['address'] : '';
        $item->summary = !empty($data['summary']) ? $data['summary'] : '';
        $item->remark = '';
        $item->status = 1;
        
        $item->save();
        
        return $item;
    }
}