<?php

namespace App\Models;

class Courses extends BasicModel
{
    protected $appends = ['status_desc', 'image_url', 'grade_name'];
    
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
        $model = new Grades();
        if (!empty($this->grade_id)) {
            $model = $model->find($this->grade_id);
        }
        return $model;
        //return $this->hasOne('App\Models\Grades');
    }
}
