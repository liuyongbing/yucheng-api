<?php

namespace App\Models;

use App\Constants\Dictionary;

class Apply extends BasicModel
{
    protected $hidden = ['updated_at'];
    
    protected $appends = ['brand', 'budget', 'status_desc'];
    
    /**
     * 品牌:文本
     *
     * @return string
     */
    public function getBrandAttribute()
    {
        $brand = Dictionary::BRAND;
        
        return isset($brand[$this->brand_id]) ? $brand[$this->brand_id] : '';
    }
    
    /**
     * 预算:文本
     *
     * @return string
     */
    public function getBudgetAttribute()
    {
        $budget = Dictionary::BUDGET;
        
        return isset($budget[$this->budget_range]) ? $budget[$this->budget_range] : '';
    }
}
