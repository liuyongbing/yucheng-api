<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicModel extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
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
