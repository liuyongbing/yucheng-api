<?php

namespace App\Models;

use App\Helpers\NewsHelper;

class News extends BasicModel
{
    protected $hidden = [
        'updated_at',
        'contents'
    ];
    
    protected $appends = [
        'category_name',
        'content',
        'status_desc',
        'thumb',
    ];
    
    /**
     * 缩略图
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return NewsHelper::thumb($this->contents);
    }
    
    /**
     * 状态:文本
     *
     * @return string
     */
    public function getStatusDescAttribute()
    {
        return trans('attributes.grades.status.' . $this->status);
    }
    
    /**
     * 内容: 处理图片地址
     * 
     * @return string
     */
    public function getContentAttribute()
    {
        return NewsHelper::outputContents($this->contents);
    }
    
    /**
     * Category Name: 分类名称
     *
     * @return string
     */
    public function getCategoryNameAttribute() {
        $item = $this->category();
        
        return $item->title;
    }
    
    public function category()
    {
        $model = new Categories();
        if (!empty($this->category_id)) {
            $model = $model->find($this->category_id);
        }
        return $model;
    }
}
