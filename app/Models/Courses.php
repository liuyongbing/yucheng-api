<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;

class Courses extends BasicModel
{
    protected $appends = ['status_desc', 'image_url', 'grade_name'];
    
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
    public function getGradeNameAttribute() {
        $grade = $this->grade();
        
        return $grade->title;
    }
    
    public function grade()
    {
        return Grades::find($this->grade_id);
        //return $this->hasOne('App\Models\Grades');
    }
}
