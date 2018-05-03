<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model
{
    protected $primaryKey = 'user_id';
    
    protected $hidden = [
        'id',
        'user_id',
        'parent_id',
        'created_at',
        'updated_at',
    ];
}
