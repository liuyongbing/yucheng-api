<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    protected $appends = ['image_url'];
    
    public function getImageUrlAttribute() {
        return 'http://www.baidu.com/' . $this->image;
    }
}
