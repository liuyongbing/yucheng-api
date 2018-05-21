<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function upload(Request $request, $filetype = 'common')
    {
        $result = [];
        if ($request->isMethod('post')) {
            $file = $request->file('upload_file');
            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName   = $file->getClientOriginalName(); // 文件原名
                $ext            = $file->getClientOriginalExtension(); // 扩展名
                $realPath       = $file->getRealPath(); //临时文件的绝对路径
                //$type           = $file->getClientMimeType(); // image/jpeg
                
                // 上传文件
                $filename = md5_file($file->getPathName());
                $dirPrefix = substr($filename, 0, 2) . '/' . substr($filename, 2, 2) . '/';
                $filename = $dirPrefix . $filename . '.' . $ext;
                
                $bool = Storage::disk('public')->put($filetype . '/' . $filename, file_get_contents($realPath));
                if ($bool) {
                    $result['title']    = $originalName;
                    $result['filename'] = $filename;
                    $result['file_url'] = FileHelper::fileUrl($filename, $filetype);
                }
            }
        }

        return $this->response($result);
    }
}
