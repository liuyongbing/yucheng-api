<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;
use App\Helpers\TeachingsHelper;
use Illuminate\Support\Facades\Storage;

class Coursewares extends BasicModel
{
    protected $appends = [
        'content',
        'course_name',
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
    
    protected function formatFilePpt($data, $filetype = 'kejian', $brand = 'pocketcat')
    {
        $filename = '';
        
        if (!empty($data['upload_ppt_filename']))
        {
            $file = env('FTP_FILE_FOLDER') . $filetype . '/' . $brand . '/' . $data['upload_ppt_filename'];
            if (file_exists($file))
            {
                $filename = $filetype . '/' . $brand . '/' . $data['upload_ppt_filename'];
                /* $types = explode('.', $file);
                $ext = end($types);
                // 上传文件
                $filehash = md5_file($file);
                $dirPrefix = substr($filehash, 0, 2) . '/' . substr($filehash, 2, 2) . '/';
                $filename = $dirPrefix . $filehash . '.' . $ext;
                
                $pathname = env('STORAGE_FILE_FOLDER') . $filetype . '/' . $dirPrefix;
                if (!is_dir($pathname))
                {
                    mkdir($pathname, true);
                }
                $command = "mv $file $pathname/$filehash.$ext";
                system($command); */
                //Storage::disk('public')->put($filetype . '/' . $filename, file_get_contents($file));
            }
        }
        elseif (!empty($data['file_ppt']))
        {
            $filename = $data['file_ppt'];
        }
        
        return $filename;
    }
}
