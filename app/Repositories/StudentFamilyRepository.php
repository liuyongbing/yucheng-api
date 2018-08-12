<?php
namespace App\Repositories;

use App\Models\StudentFamily;

class StudentFamilyRepository extends Repository
{
    public function init()
    {
        $this->model = new StudentFamily();
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
        
        $item->student_id   = !empty($data['student_id']) ? $data['student_id'] : '';
        $item->relation     = $data['relation'];
        $item->name         = !empty($data['name']) ? $data['name'] : '';
        $item->mobile       = !empty($data['mobile']) ? $data['mobile'] : '';
        $item->email        = !empty($data['email']) ? $data['email'] : '';
        $item->industry     = !empty($data['industry']) ? $data['industry'] : '';
        $item->post         = !empty($data['post']) ? $data['post'] : '';
        $item->status       = 1;
        
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