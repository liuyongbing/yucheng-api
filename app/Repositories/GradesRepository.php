<?php
namespace App\Repositories;

use App\Models\Grades;

class GradesRepository extends Repository
{
    /**
     * 详情
     * 
     * @param int $id
     * @return array
     */
    public function detail($id)
    {
        $item = Grades::find($id);
        
        return $item;
    }
    
    /**
     * 列表
     * 
     * @param array $params
     * @return array
     */
    public function list($conditions)
    {
        $query = Grades::where($conditions);
        
        $count = $query->count();
        //$items = $query->skip($offset)->take($limit)->get();
        $items = $query->get();
        
        return [
            'total' => $count,
            'list' => $items
        ];
    }
    
    /**
     * 新增
     * 
     * @param array $data
     * @return \App\Models\Grades
     */
    public function store($data)
    {
        $item = new Grades();
        
        $item->title = $data['title'];
        
        $item->save();
        
        return $item;
    }
    
    /**
     * 修改
     * 
     * @param int $id
     * @param array $data
     * @return \App\Models\Grades
     */
    public function update($id, $data = [])
    {
        $item = Grades::find($id);
        
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