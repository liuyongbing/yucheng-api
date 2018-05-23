<?php

namespace App\Http\Controllers;

use App\Repositories\CoursesRepository;
use Illuminate\Http\Request;
use App\Constants\Dictionary;

class CoursesController extends Controller
{
    public function init()
    {
        $this->repository = new CoursesRepository();
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $gradeId = $request->input('grade_id', 0);
        $page = $request->input('page', 1);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        $offset = (int)($page-1) * $size;
        
        $order = $request->input('order', '');
        
        $params = [
            'grade_id' => $gradeId
        ];
        
        $result = $this->repository->list($params, $offset, $size, $order);
        return $this->response($result);
    }
}
