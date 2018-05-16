<?php
namespace App\Repositories;

use App\Helpers\SmsHelper;
use App\Models\Sms;
use App\Constants\Dictionary;

class SmsRepository extends Repository
{
    public function init()
    {
        $this->model = new Sms();
    }
    
    public function send($mobile, $params)
    {
        $result = [];
        
        $item = $this->model;
        
        $item->mobile = $mobile;
        $item->action = isset($params['action']) ? $params['action'] : 'login';
        $item->message = isset($params['message']) ? $params['message'] : '';
        $item->template_id = 0;
        $item->send_status = 0;
        $item->send_result = '';
        
        //先记录本地请求
        $item->save();
        
        $response = SmsHelper::send($mobile, $item->message);
        if (isset($response['Code']) && 'OK' == $response['Code'])
        {
            $item->send_status = 1;
            
            $result = [];
        }
        else
        {
            $result = $response['Message'];
        }
        
        //记录请求服务商结果
        $item->send_result = json_encode($response, JSON_UNESCAPED_UNICODE);
        $item->save();
        
        return $result;
    }
    
    /**
     * 验证验证码
     *
     * @param string $mobile
     * @param int $code
     * @return boolean
     */
    public function verify($mobile, $code)
    {
        $end = time();
        $start = $end - Dictionary::VERIFYCODE_TIME;
        $end = date('Y-m-d H:i:s', $end);
        $start = date('Y-m-d H:i:s', $start);
        
        $message = $this->model
                        ->where('mobile', $mobile)
                        ->whereBetween('created_at', [
                            $start, $end
                        ])->value('message');
        
        return $message === $code;
    }
}