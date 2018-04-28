<?php
namespace App\Helpers;

class FileHelper
{
    public static function fileUrl($filename, $filetype)
    {
        return env('APP_FILE_SERVER') . '/' . $filetype . '/' . $filename;
    }
}