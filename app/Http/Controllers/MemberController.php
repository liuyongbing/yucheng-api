<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\MemberRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function init()
    {
        $this->repository = new MemberRepository();
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
        if (!empty($status))
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
}
