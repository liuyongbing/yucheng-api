<?php

namespace App\Events;

class UploadCoursewareEvent
{
    public $coursewareFile;
    
    public function __construct($coursewareFile)
    {
        $this->coursewareFile= $coursewareFile;
    }
}
