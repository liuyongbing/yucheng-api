<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;
use Illuminate\Http\Request;
use App\Constants\Dictionary;

class GradesController extends Controller
{
    public function init()
    {
        $this->repository = new GradesRepository();
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $status = $request->input('status', '');
        $page = $request->input('page', 1);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        $offset = (int)($page-1) * $size;
        
        $order = $request->input('order', '');
        
        $params = [];
        if (!empty($status))
        {
            $params['status'] = $status;
        }
        
        $result = $this->repository->list($params, $offset, $size, $order);
        return $this->response($result);
    }
}
