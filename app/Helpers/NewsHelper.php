<?php
namespace App\Helpers;

use App\Constants\Dictionary;

/**
 * 资讯处理 Helper
 * 
 * 1. 保存时, 若有图片, 只保存图片的相对URL地址;
 * 2. 查看时, 若有图片, 拼接上图片的绝对URL地址;
 * 3. 查看时, 若有图片, 截取第一张作为头图;
 */
class NewsHelper
{
    public static $fileType = Dictionary::FILE_TYPE['WEBSITE'];
    
    public static function inputContents($contents)
    {
        $fileServer = env('APP_FILE_SERVER');
        $fileUrl = $fileServer . '/' . self::$fileType . '/';
        $contents = str_replace($fileUrl, '', $contents);
        
        return $contents;
    }
    
    public static function outputContents($contents)
    {
        
    }
    
    public static function thumb($contents)
    {
        $thumb = '';
        if (preg_match('/<img.*?(?:>|\/>)/i', $contents, $matchItem))
        {
            if (!empty($matchItem[0]))
            {
                preg_match('/src=[\'\"]?([^\'\"]*)[\'\"]?/i', $matchItem[0], $imgUrl);
                
                $thumb = FileHelper::fileUrl($imgUrl[1], self::$fileType);
            }
        }
        
        return $thumb;
    }
}