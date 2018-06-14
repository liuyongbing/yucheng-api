<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function init()
    {
        $this->repository = new BannerRepository();
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $positionId = $request->input('position_id', '');
        $status = $request->input('status', '');
        $page = $request->input('page', 1);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        $offset = (int)($page-1) * $size;
        
        $order = $request->input('order', '');
        
        $params = [];
        if (!empty($positionId))
        {
            $params['position_id'] = $positionId;
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
        $positionId = $request->input('position_id', '');
        $status = $request->input('status', '');
        
        $params = [];
        if (!empty($positionId))
        {
            $params['position_id'] = $positionId;
        }
        if (!empty($status))
        {
            $params['status'] = $status;
        }
        $order = $request->input('order', '');
        
        $result = $this->repository->all($params, $order);
        return $this->response($result);
    }
}
