<?php

namespace App\Models;

class Students extends BasicModel
{
    protected $appends = [
        'card_number',
        'family_members',
        'status_desc',
    ];
    
    /**
     * 会员卡号
     *
     * @return string
     */
    public function getCardNumberAttribute()
    {
        //0011117312
        $numLen = 10;
        
        $cardNumber = $this->id;
        $len = strlen($cardNumber);
        
        if ($numLen > $len)
        {
            $numPrefix = str_repeat('0', $numLen-$len);
            $cardNumber = $numPrefix . $cardNumber;
        }
        
        return $cardNumber;
    }
    
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
