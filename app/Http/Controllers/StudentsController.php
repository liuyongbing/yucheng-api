<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\StudentsRepository;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function init()
    {
        $this->repository = new StudentsRepository();
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $brandId = $request->input('brand_id', '');
        $teamType = $request->input('team_type', '');
        $username = $request->input('username', '');
        $status = $request->input('status', '');
        $offset = $request->input('offset', 0);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        
        $order = $request->input('order', '');
        
        $params = [];
        if (!empty($brandId))
        {
            $params['brand_id'] = $brandId;
        }
        if (!empty($teamType))
        {
            $params['team_type'] = $teamType;
        }
        if (!empty($username))
        {
            $params['username'] = $username;
        }
        if (is_numeric($status))
        {
            $params['status'] = $status;
        }
        
        $result = $this->repository->list($params, $offset, $size, $order);
        return $this->response($result);
    }
    
    /**
     * all
     *
     * @param Request $request
     * @return array
     */
    public function all(Request $request)
    {
        $brandId = $request->input('brand_id', '');
        $teamType = $request->input('team_type', '');
        $status = $request->input('status', '');
        
        $order = $request->input('order', '');
        
        $params = [];
        if (!empty($brandId))
        {
            $params['brand_id'] = $brandId;
        }
        if (!empty($teamType))
        {
            $params['team_type'] = $teamType;
        }
        if (!empty($status))
        {
            $params['status'] = $status;
        }
        
        $result = $this->repository->all($params, $order);
        return $this->response($result);
    }
    
    /**
     * 根据微信openid获取学生详情
     * 
     * @param string $openid
     * @return array
     */
    public function showByOpenid($openid)
    {
        $result = $this->repository->showByOpenid($openid);
        return $this->response($result);
    }
    
    /**
     * 学员绑定微信
     * 
     * @param Request $request
     */
    public function bindWechat(Request $request)
    {
        $openid     = $request->input('openid', '');
        $mobile     = $request->input('mobile', '');
        $studentId  = $request->input('student_id', '');
        
        $result = $this->repository->bindWechat($openid, $studentId, $mobile);
        return $this->response($result);
    }
}
