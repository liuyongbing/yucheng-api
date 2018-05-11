<?php

namespace App\Models;

class News extends BasicModel
{
    protected $appends = ['status_desc'];
    
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
