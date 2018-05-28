<?php
namespace App\Helpers;

use App\Constants\Dictionary;

/**
 * 课件内容 Helper
 */
class TeachingsHelper extends ContentsHelper
{
    public static $fileType = Dictionary::FILE_TYPE['COURSEWARE'];
    
}