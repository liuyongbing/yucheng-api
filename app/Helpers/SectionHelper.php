<?php
namespace App\Helpers;

use App\Constants\Dictionary;

/**
 * Section Helper
 * 
 * 1. 保存时, 若有图片, 只保存图片的相对URL地址;
 * 2. 查看时, 若有图片, 拼接上图片的绝对URL地址;
 * 3. 查看时, 若有图片, 截取第一张作为头图;
 */
class SectionHelper
{
    public static $fileType = Dictionary::FILE_TYPE['WEBSITE'];
    
    public static function inputContents($contents)
    {
        $contents = str_replace(static::fileUrl(), '', $contents);
        
        return $contents;
    }
    
    public static function outputContents($contents)
    {
        $pattern = '/src=[\'\"]?([^\'\"]*)[\'\"]?/i';
        $contents = preg_replace($pattern, 'src="' . static::fileUrl() . '${1}"', $contents);
        return $contents;
    }
    
    public static function fileUrl()
    {
        return FileHelper::fileServer() . '/' . self::$fileType . '/';
    }
}