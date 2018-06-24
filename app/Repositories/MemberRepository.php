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
        $item->titles       = !empty($data['titles']) ? $this->formatTitles($data['titles']) : '';
        $item->summary      = !empty($data['summary']) ? $data['summary'] : '';
        $item->image        = !empty($data['image']) ? $data['image'] : '';
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