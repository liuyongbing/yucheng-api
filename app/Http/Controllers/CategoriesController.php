<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function init()
    {
        $this->repository = new CategoriesRepository();
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
