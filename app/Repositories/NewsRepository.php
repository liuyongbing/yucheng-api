<?php
namespace App\Repositories;

use App\Helpers\NewsHelper;
use App\Models\News;

class NewsRepository extends Repository
{
    public function init()
    {
        $this->model = new News();
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
        $item->branch_id    = (int)$data['branch_id'];
        $item->title        = !empty($data['title']) ? $data['title'] : '';
        $item->contents     = !empty($data['contents']) ? NewsHelper::inputContents($data['contents']) : '';
        $item->summary      = $this->formatSummary($item->contents);
        $item->show_year    = $this->formatShowYear();
        $item->sort         = (int)$data['sort'];
        $item->status       = 1;
        
        $item->save();
        
        return $item;
    }
    
    protected function formatSummary($contens)
    {
        return 'TODO:从内容中截取概要';
    }
    
    protected function formatShowYear()
    {
        return date('Y');
    }
}