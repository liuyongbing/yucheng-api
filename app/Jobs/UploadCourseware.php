<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * 将通过FTP手动上传的大文件课件上传至 officeweb365服务器 
 * 
 * @author liuyongbing(54026099@qq.com)
 */
class UploadCourseware implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $coursewareFile;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($coursewareFile)
    {
        $this->coursewareFile = $coursewareFile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //ftp://120.55.116.241:9812/doc_100yjy_com
        $host = env('FTP_HOST', '120.55.116.241');
        $port = env('FTP_PORT', 9812);
        $username = env('FTP_USERNAME', '100yjy.com');
        $password = env('FTP_PASSWORD', 'hjtX8pXUQu');
        $folder = env('FTP_FOLDER', '/doc_100yjy_com');
        
        $file = env('FTP_FILE_FOLDER') . $this->coursewareFile;
        $remoteFile = md5_file($file) . '.pptx';
        
        $conn = ftp_connect($host, $port);
        if (ftp_login($conn, $username, $password))
        {
            ftp_pasv($conn, true);
            
            ftp_chdir($conn, $folder);
            ftp_put($conn, $remote_file, $file, FTP_BINARY);
        }
        
        ftp_close($conn);
    }
}