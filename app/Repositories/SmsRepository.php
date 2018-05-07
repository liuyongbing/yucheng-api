<?php
namespace App\Repositories;

use App\Helpers\SmsHelper;
use App\Models\Sms;

class SmsRepository extends Repository
{
    public function init()
    {
        $this->model = new Sms();
    }
    
    public function send($mobile, $params)
    {
        $item = $this->model;
        
        $item->mobile = $mobile;
        $item->action = isset($params['action']) ? $params['action'] : 'login';
        $item->message = isset($params['message']) ? $params['message'] : '';
        $item->template_id = 0;
        $item->send_status = 0;
        $item->send_result = '';
        
        //先记录本地请求
        $item->save();
        
        $result = SmsHelper::send($mobile, $item->message);
        if (isset($result['status']) && 'success' == $result['status'])
        {
            $item->send_status = 1;
        }
        
        //再记录请求服务商结果
        $item->send_result = json_encode($result, JSON_UNESCAPED_UNICODE);
        $item->save();
        
        return $result;
    }
}