<?php

namespace App\Models;

class WechatOauth extends BasicModel
{
    protected $table = 'wechat_oauth';
    
    protected $fillable = ['openid', 'original'];
    
    protected $appends = [
        'student_id',
    ];
    
    /**
     * 学员ID
     *
     * @return string
     */
    public function getStudentIdAttribute()
    {
        $studentId = 0;
        $model = new WechatStudents();
        if (!empty($this->openid)) {
            $model = $model->where(['openid' => $this->openid])->first();
            if (!empty($model))
            {
                $studentId = $model->student_id;
            }
        }
        
        return $studentId;
    }
}
