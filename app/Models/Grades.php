<?php

namespace App\Models;

use App\Constants\Dictionary;
use App\Helpers\FileHelper;

class Grades extends BasicModel
{
    protected $appends = ['status_desc', 'image_url'];
}
