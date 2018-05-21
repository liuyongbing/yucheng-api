<?php

namespace App\Models;

use App\Helpers\NewsHelper;

class News extends BasicModel
{
    protected $hidden = [
        'created_at',
        'updated_at',
        'contents'
    ];
    
    protected $appends = ['thumb', 'content', 'status_desc'];
    
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
}
