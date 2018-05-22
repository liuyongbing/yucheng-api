<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function init()
    {
        $this->repository = new NewsRepository();
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $year = $request->input('year', '');
        $categoryId = $request->input('category_id', '');
        $page = $request->input('page', 1);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        $offset = (int)($page-1) * $size;
        
        $order = $request->input('order', '');
        
        $params = [];
        if (!empty($year))
        {
            $params['show_year'] = $year;
        }
        if (!empty($categoryId))
        {
            $params['category_id'] = $categoryId;
        }
        
        $result = $this->repository->list($params, $offset, $size, $order);
        return $this->response($result);
    }
    
    /**
     * 新闻年份
     * 
     * @return array
     */
    public function years()
    {
        $result = $this->repository->years();
        return $this->response($result);
    }
}
