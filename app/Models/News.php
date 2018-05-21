<?php

namespace App\Models;

use App\Helpers\NewsHelper;

class News extends BasicModel
{
    protected $appends = ['thumb', 'status_desc'];
    
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
}
