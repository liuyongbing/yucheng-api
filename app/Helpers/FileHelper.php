<?php
namespace App\Helpers;

class FileHelper
{
    public static function fileUrl($filename, $filetype)
    {
        return static::fileServer() . '/' . $filetype . '/' . $filename;
    }
    
    public static function fileServer()
    {
        return env('APP_FILE_SERVER', '');
    }
}