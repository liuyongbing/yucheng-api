<?php

namespace App\Models;

class Students extends BasicModel
{
    protected $appends = [
        'family_members',
        'status_desc',
    ];
    
    /**
     * 家庭成员
     *
     * @return string
     */
    public function getFamilyMembersAttribute()
    {
        $members = [];
        
        $items = StudentFamily::where('student_id', $this->id)->get();
        if (!empty($items))
        {
            foreach ($items as $item)
            {
                $members[$item->relation] = $item;
            }
        }
        
        return $members;
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
