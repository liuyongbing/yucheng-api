<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;

class Teachings extends BasicModel
{
    protected $appends = ['status_desc', 'image_url', 'course_name'];
    
    /**
     * 图片:完整Url
     *
     * @return string
     */
    public function getImageUrlAttribute() {
        return FileHelper::fileUrl($this->image, Dictionary::FILE_TYPE['COURSEWARE']);
    }
    
    /**
     * 状态:文本
     *
     * @return string
     */
    public function getStatusDescAttribute() {
        return trans('attributes.grades.status.' . $this->status);
    }
    
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
}
