<?php
namespace App\Repositories;

use App\Models\Categories;

class CategoriesRepository extends Repository
{
    public function init()
    {
        $this->model = new Categories();
    }
    
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($conditions, $offset = 0, $limit = 10, $order = [])
    {
        $result = parent::list($conditions, $offset, $limit, $order);
        
        $data = [];
        if (!empty($result['list']))
        {
            foreach ($result['list'] as $item)
            {
                $data[$item['id']] = $item;
            }
        }
        
        return [
            'total' => $result['total'],
            'list' => $data
        ];
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
        
        $item->title        = !empty($data['title']) ? $data['title'] : '';
        $item->parent_id    = isset($data['parent_id']) ? (int)$data['parent_id'] : 0;
        $item->sort         = isset($data['sort']) ? (int)$data['sort'] : 100;
        $item->status       = 1;
        
        $item->save();
        
        return $item;
    }
}