<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;

class Section extends BasicModel
{
    protected $appends = ['status_desc'];
    
    /**
     * 图片:完整Url
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return FileHelper::fileUrl($this->image, Dictionary::FILE_TYPE['WEBSITE']);
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
    
    public function getPositionAttribute()
    {
        $positions = Dictionary::$positions;
        
        return isset($positions[$this->position_id])
                    ? trans('positions.' . $positions[$this->position_id])
                    : '';
    }
}
