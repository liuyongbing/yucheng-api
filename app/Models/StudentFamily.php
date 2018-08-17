<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;

class StudentFamily extends BasicModel
{
    protected $appends = [
        'status_desc',
    ];
    
    /**
     * 团队
     *
     * @return string
     */
    public function getTeamAttribute()
    {
        $team = Dictionary::TEAM_TYPES;
        return isset($team[$this->team_type]) ? $team[$this->team_type] : '';
    }
    
    /**
     * 图片:完整Url
     * 
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return FileHelper::fileUrl($this->image, Dictionary::FILE_TYPE['COURSEWARE']);
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
}
