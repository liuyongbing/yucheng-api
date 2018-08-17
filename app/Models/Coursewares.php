<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;
use App\Helpers\TeachingsHelper;

class Coursewares extends BasicModel
{
    protected $appends = [
        'content',
        'course_name',
        'course',
        'file_music_url',
        'file_ppt_url',
        'file_ppt_online_url',
        'file_video_url',
        'status_desc',
    ];
    
    /**
     * 班级:文本
     *
     * @return string
     */
    public function getCourseNameAttribute()
    {
        $model = $this->course();
        
        return $model->title;
    }
    
    /**
     * 班级:文本
     *
     * @return string
     */
    public function getCourseAttribute()
    {
        return $this->course();
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
    
    /**
     * 课件PPT:完整Url
     *
     * @return string
     */
    public function getFilePptUrlAttribute()
    {
        return FileHelper::fileUrl($this->file_ppt, Dictionary::FILE_TYPE['COURSEWARE']);
    }
    
    /**
     * 课件PPT:完整Url
     *
     * @return string
     */
    public function getFilePptOnlineUrlAttribute()
    {
        //http://ow365.cn/?i=16363&furl=http://file.100yjy.com/demo.pptx
        return env('OFFICE_WEB_SITE', 'http://ow365.cn/') . '?i=' . 
               env('OFFICE_WEB_ID', '16363') . '&furl=' . 
               $this->file_ppt_url;
    }
    
    /**
     * 课件音频:完整Url
     *
     * @return string
     */
    public function getFileMusicUrlAttribute()
    {
        return FileHelper::fileUrl($this->file_music, Dictionary::FILE_TYPE['COURSEWARE']);
    }
    
    /**
     * 课件视频:完整Url
     *
     * @return string
     */
    public function getFileVideoUrlAttribute()
    {
        return FileHelper::fileUrl($this->file_video, Dictionary::FILE_TYPE['COURSEWARE']);
    }
}
