<?php
namespace App\Repositories;

use App\Models\Students;

class StudentsRepository extends Repository
{
    public function init()
    {
        $this->model = new Students();
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
        
        $item->name         = !empty($data['name']) ? $data['name'] : '';
        $item->gender       = $data['gender'];
        $item->birthday     = $data['birthday'];
        $item->id_number    = !empty($data['id_number']) ? $data['id_number'] : '';
        $item->address      = !empty($data['address']) ? $data['address'] : '';
        $item->school       = !empty($data['school']) ? $data['school'] : '';
        $item->linkman      = !empty($data['linkman']) ? $data['linkman'] : '';
        $item->mobile       = !empty($data['mobile']) ? $data['mobile'] : '';
        $item->status       = 1;
        
        $item->save();
        
        if (!empty($data['family_member']))
        {
            $result = [];
            foreach ($data['family_member'] as $relation => $member)
            {
                $repository = new StudentFamilyRepository();
                $member['student_id'] = $item->id;
                $member['relation'] = $relation;
                $result[] = $repository->store($member);
            }
        }
        
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
        
        if (!empty($data['family_member']))
        {
            $result = [];
            foreach ($data['family_member'] as $relation => $member)
            {
                $repository = new StudentFamilyRepository();
                $member['student_id'] = $item->id;
                $member['relation'] = $relation;
                
                if (!empty($member['id']))
                {
                    $repository->update($member['id'], $member);
                }
                else 
                {
                    $result[] = $repository->store($member);
                }
            }
        }
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