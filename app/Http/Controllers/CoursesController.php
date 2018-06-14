<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\CoursesRepository;
use Illuminate\Http\Request;

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
        $status = $request->input('status', 0);
        $offset = $request->input('offset', 0);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        
        $order = $request->input('order', '');
        
        $params = [
            'grade_id' => $gradeId
        ];
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
        $gradeId = $request->input('grade_id', 0);
        $status = $request->input('status', 0);
        
        $order = $request->input('order', '');
        
        $params = [
            'grade_id' => $gradeId
        ];
        if (!empty($status))
        {
            $params['status'] = $status;
        }
        
        $result = $this->repository->all($params, $order);
        return $this->response($result);
    }
}
