<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Model;

class BasicModel extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
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
     * 图片:完整Url
     *
     * @return string
     */
    public function getImageUrlAttribute() {
        return FileHelper::fileUrl($this->image, Dictionary::FILE_TYPE['COURSEWARE']);
    }
}
