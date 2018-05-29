<?php
namespace App\Repositories;

use App\Helpers\NewsHelper;
use App\Models\Apply;

class ApplyRepository extends Repository
{
    public function init()
    {
        $this->model = new Apply();
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
        
        $item->category_id  = (int)$data['category_id'];
        $item->branch_id    = isset($data['branch_id']) ? (int)$data['branch_id'] : 0;
        $item->title        = !empty($data['title']) ? $data['title'] : '';
        $item->contents     = !empty($data['contents']) ? NewsHelper::inputContents($data['contents']) : '';
        $item->summary      = $this->formatSummary($item->contents);
        $item->show_year    = $this->formatShowYear();
        $item->sort         = (int)$data['sort'];
        $item->status       = 1;
        
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
        
        $data['contents'] = NewsHelper::inputContents($data['contents']);
        $data['summary'] = $this->formatSummary($data['contents']);
        
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
    
    public function years()
    {
        $data = [];
        $items = $this->model->select('show_year')->distinct()->get();
        foreach ($items as $item)
        {
            $data[$item->show_year] = $item->show_year;
        }
        rsort($data);
        
        return $data;
    }
    
    public function next($id)
    {
        $item = $this->model->where('id', '>', $id)
                            ->where('status', '=', 1)
                            ->first();
        
        return $item;
    }
    
    public function previous($id)
    {
        $item = $this->model->where('id', '<', $id)
                            ->where('status', '=', 1)
                            ->first();
        
        return $item;
    }
    
    protected function formatSummary($contens)
    {
        return '';
    }
    
    protected function formatShowYear()
    {
        return date('Y');
    }
}