<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;

class Member extends BasicModel
{
    protected $appends = ['status_desc', 'image_url'];
    
    /**
     * 图片:完整Url
     * 
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return FileHelper::fileUrl($this->image, Dictionary::FILE_TYPE['COURSEWARE']);
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
