<?php

namespace App\Listeners;

use App\Events\UploadCourseware;

class UploadCourseware
{
    public function handle(UploadCourseware $event)
    {
        //ftp://120.55.116.241:9812/doc_100yjy_com
        $host = env('FTP_HOST');
        $port = env('FTP_PORT');
        $username = env('FTP_USERNAME');
        $password = env('FTP_PASSWORD');
        $folder = env('FTP_FOLDER');
        
        $file = env('FTP_FILE_FOLDER') . $event->coursewareFile;
        $remoteFile = md5_file($file) . '.pptx';
        
        $conn = ftp_connect($host, $port);
        if (ftp_login($conn, $username, $password))
        {
            ftp_pasv($conn, true);
            
            ftp_chdir($conn, $folder);
            ftp_put($conn, $remoteFile, $file, FTP_BINARY);
        }
        
        ftp_close($conn);

        return true;
    }
}
