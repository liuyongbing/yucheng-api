<?php
namespace App\Repositories;

use App\Models\Courses;

class CoursesRepository extends Repository
{
    public function init()
    {
        $this->model = new Courses();
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
        
        $item->grade_id     = (int)$data['grade_id'];
        $item->title        = !empty($data['title']) ? $data['title'] : '';
        $item->summary      = !empty($data['summary']) ? $data['summary'] : '';
        $item->image        = !empty($data['image']) ? $data['image'] : '';
        $item->class_total  = (int)$data['class_total'];
        $item->sort         = (int)$data['sort'];
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
        $query = $this->model->where($conditions)->where('status', '>=', 0);
        
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
    
    /**
     * All
     *
     * @param array $params
     * @return array
     */
    public function all($conditions, $order = [])
    {
        $query = $this->model->where($conditions)->where('status', '>=', 0);
        
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
        
        $items = $query->get();
        
        return [
            'total' => $count,
            'list' => $items
        ];
    }
}