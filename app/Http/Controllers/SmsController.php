<?php

namespace App\Http\Controllers;

use App\Repositories\SmsRepository;
use Illuminate\Http\Request;

/**
 * 短信发送
 */
class SmsController extends Controller
{
    public function init()
    {
        $this->repository = new SmsRepository();
    }
    
    public function send(Request $request)
    {
        $mobile     = $request->input('mobile');
        $action     = $request->input('action');
        $message    = $request->input('message');
        
        $params = [
            'action' => $action,
            'message' => $message
        ];
        $result = $this->repository->send($mobile, $params);
        
        return $this->response($result);
    }
}
