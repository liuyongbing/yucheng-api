<?php
namespace App\Repositories;

use App\Models\Member;

class MemberRepository extends Repository
{
    public function init()
    {
        $this->model = new Member();
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
        
        $item->brand_id     = (int)$data['brand_id'];
        $item->team_type    = (int)$data['team_type'];
        $item->username     = !empty($data['username']) ? $data['username'] : '';
        $item->mobile       = !empty($data['mobile']) ? $data['mobile'] : '';
        $item->summary      = !empty($data['summary']) ? $data['summary'] : '';
        $item->image        = !empty($data['image']) ? $data['image'] : '';
        $item->sort         = (int)$data['sort'];
        $item->status       = 1;
        
        $item->save();
        
        return $item;
    }
}