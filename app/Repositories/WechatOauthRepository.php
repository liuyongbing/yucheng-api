<?php
namespace App\Repositories;

use App\Models\WechatOauth;

class WechatOauthRepository extends Repository
{
    public function init()
    {
        $this->model = new WechatOauth();
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
        
        $item->openid   = !empty($data['openid']) ? $data['openid'] : '';
        $item->original = !empty($data['original']) ? $data['original'] : '';
        
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
    
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($conditions, $offset = 0, $limit = 10, $order = [])
    {
        if (!empty($conditions['username']))
        {
            $query = $this->model->where('username', 'like', '%' . $conditions['username'] . '%');
            unset($conditions['username']);
        }
        
        if (!isset($query))
        {
            $query = $this->model->where($conditions);
        }
        else
        {
            $query = $query->where($conditions);
        }
        
        $count = $query->count();
        
        if (!empty($order))
        {
            if (is_array($order))
            {
                foreach ($order as $column => $type)
                {
                    $query = $query->orderBy($column, $type);
                }
            }
            else
            {
                $query = $query->orderBy($order);
            }
        }
        
        $items = $query->skip($offset)->take($limit)->get();
        
        return [
            'total' => $count,
            'list' => $items
        ];
    }
    
    public function formatTitles($titles)
    {
        $titlesArr = explode('|', $titles);
        foreach ($titlesArr as $key => $title)
        {
            $titlesArr[$key] = trim($title);
        }
        
        return implode(' | ', $titlesArr);
    }
}