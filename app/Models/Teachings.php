<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;
use App\Helpers\TeachingsHelper;

class Teachings extends BasicModel
{
    protected $appends = [
        'content',
        'course_name',
        'image_url',
        'status_desc',
    ];
    
    /**
     * 班级:文本
     *
     * @return string
     */
    public function getCourseNameAttribute() {
        $model = $this->course();
        
        return $model->title;
    }
    
    public function course()
    {
        $model = new Courses();
        if (!empty($this->course_id)) {
            $model = $model->find($this->course_id);
        }
        return $model;
    }
    
    /**
     * 内容: 处理图片地址
     *
     * @return string
     */
    public function getContentAttribute()
    {
        return TeachingsHelper::outputContents($this->summary);
    }
}
