<?php
namespace App\Repositories;

use App\Models\BasicModel;

/**
 * Repository 基类
 * 
 * 其他Repository 可根据业务需要重写基类相关方法
 * 
 * @author liuyongbing
 * @email  54026099@qq.com
 */
class Repository
{
    public $model = null;
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        $this->model = new BasicModel();
    }
        
    /**
     * 详情
     *
     * @param int $id
     * @return array
     */
    public function detail($id)
    {
        $item = $this->model->find($id);
        
        return $item;
    }
    
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($conditions, $offset = 0, $limit = 10, $order = '')
    {
        $query = $this->model->where($conditions);
        
        $count = $query->count();
        
        if (!empty($order)) 
        {
            $query = $query->orderBy($order);
        }
            
        $items = $query->skip($offset)->take($limit)->get();
        
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
        $item = $this->model;
        
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
        $item = $this->model->find($id);
        $attributes = $item->getAttributes();
        
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