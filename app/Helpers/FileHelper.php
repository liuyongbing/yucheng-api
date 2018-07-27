<?php
namespace App\Helpers;

class FileHelper
{
    public static function fileUrl($filename, $filetype)
    {
        $fileUrl = '';
        if (!empty($filename))
        {
            if (preg_match('/^kejian/U', $fileppt, $matchItems))
            {
                $fileUrl = static::fileServer() . '/' . $filename;
            }
            else
            {
                $fileUrl = static::fileServer() . '/' . $filetype . '/' . $filename;
            }
        }
        return $fileUrl;
    }
    
    public static function fileServer()
    {
        return env('APP_FILE_SERVER', '');
    }
}