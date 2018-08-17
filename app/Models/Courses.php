<?php

namespace App\Models;

class Courses extends BasicModel
{
    protected $appends = [
        'grade',
        'grade_name',
        'image_url',
        'status_desc',
    ];
    
    /**
     * 班级:文本
     *
     * @return string
     */
    public function getGradeNameAttribute()
    {
        $grade = $this->grade();
        
        return $grade->title;
    }
    
    /**
     * 班级:文本
     *
     * @return string
     */
    public function getGradeAttribute()
    {
        return $this->grade();
    }
    
    public function grade()
    {
        $model = new Grades();
        if (!empty($this->grade_id))
        {
            $model = $model->find($this->grade_id);
        }
        return $model;
    }
}
