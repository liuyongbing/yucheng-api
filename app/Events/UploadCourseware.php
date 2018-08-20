<?php

namespace App\Events;

class UploadCourseware
{
    public $coursewareFile;
    
    public function __construct($coursewareFile)
    {
        $this->coursewareFile= $coursewareFile;
    }
}
