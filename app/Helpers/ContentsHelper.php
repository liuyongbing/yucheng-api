<?php
namespace App\Helpers;

use App\Constants\Dictionary;

/**
 * 内容处理 Helper
 * 
 * 1. 保存时, 若有图片, 只保存图片的相对URL地址;
 * 2. 查看时, 若有图片, 拼接上图片的绝对URL地址;
 */
class ContentsHelper
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
    
    public static function thumb($contents)
    {
        $thumb = '';
        if (preg_match('/<img.*?(?:>|\/>)/i', $contents, $matchItem))
        {
            if (!empty($matchItem[0]))
            {
                preg_match('/src=[\'\"]?([^\'\"]*)[\'\"]?/i', $matchItem[0], $imgUrl);
                
                $thumb = FileHelper::fileUrl($imgUrl[1], static::$fileType);
            }
        }
        
        return $thumb;
    }
    
    public static function fileUrl()
    {
        return FileHelper::fileServer() . '/' . static::$fileType . '/';
    }
}