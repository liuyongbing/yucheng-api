<?php
namespace App\Repositories;

use App\Models\BasicModel;

class Repository
{
    public function getModel()
    {
        return new BasicModel();
    }
    /**
     * 详情
     *
     * @param int $id
     * @return array
     */
    public function detail($id)
    {
        $item = $this->getModel()->find($id);
        
        return $item;
    }
    
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($conditions, $offset = 0, $limit = 10, $order = 'sort')
    {
        $query = $this->getModel()->where($conditions);
        
        $count = $query->count();
        $items = $query->orderBy($order)->skip($offset)->take($limit)->get();
        
        return [
                'total' => $count,
                'list' => $items
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
        $item = $this->getModel();
        
        $item->title  = !empty($data['title']) ? $data['title'] : '';
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
     * @return \App\Models\BasicModel
     */
    public function update($id, $data = [])
    {
        $item = $this->getModel()->find($id);
        
        foreach ($data as $key => $value)
        {
            if ($item->getAttribute($key)) {
                $item->$key = $value;
            }
        }
        $item->save();
        
        return $item;
    }
}