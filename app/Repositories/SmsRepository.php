<?php
namespace App\Repositories;

use App\Constants\Dictionary;
use App\Helpers\SmsHelper;
use App\Models\Accounts;
use App\Models\Sms;

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
        
        $checkResult = $this->checkAccount($mobile);
        if (true === $checkResult)
        {
            $response = SmsHelper::send($mobile, $item->message);
            if (isset($response['Code']) && 'OK' == $response['Code'])
            {
                $item->send_status = 1;
                $result = ['message' => 'OK'];
            }
            else
            {
                switch ($response['Code'])
                {
                    case 'isv.BUSINESS_LIMIT_CONTROL':
                        $result = ['message' => '获取太频繁'];
                        break;
                    default:
                        $result = ['message' => $response['Message']];
                        break;
                }
            }
            //记录请求服务商结果
            $item->send_result = json_encode($response, JSON_UNESCAPED_UNICODE);
            $item->save();
        }
        else
        {
            $result = $checkResult;
        }
        
        return $result;
    }
    
    /**
     * 检测账号有效性
     * 
     * @param string $mobile
     * @return boolean|string[]
     */
    public function checkAccount($mobile)
    {
        $result = true;
        
        $account = Accounts::where('username', $mobile)->first();
        if (is_null($account))
        {
            $result = ['message' => '账号未开通'];
        }
        else if (1 != $account->status)
        {
            $result = ['message' => '账号已禁用'];
        }
        
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