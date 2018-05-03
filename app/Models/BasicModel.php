<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicModel extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
