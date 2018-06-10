<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\SectionHelper;

class Section extends BasicModel
{
    protected $hidden = [
        'contents',
        'created_at',
        'updated_at',
    ];
    
    protected $appends = ['content', 'page', 'status_desc'];
    
    public function getPageAttribute()
    {
        $pages = Dictionary::$pages;
        
        return isset($pages[$this->page_id])
                    ? trans('pages.' . $pages[$this->page_id])
                    : '';
    }
    
    /**
     * 内容: 处理图片地址
     *
     * @return string
     */
    public function getContentAttribute()
    {
        return SectionHelper::outputContents($this->contents);
    }
}
