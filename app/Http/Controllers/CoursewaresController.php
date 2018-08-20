<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\CoursewaresRepository;
use Illuminate\Http\Request;
use App\Jobs\UploadCourseware;

class CoursewaresController extends Controller
{
    public function init()
    {
        $this->repository = new CoursewaresRepository();
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $params = [];
        
        $courseId = $request->input('course_id');
        if (!empty($courseId))
        {
            $params['course_id'] = $courseId;
        }
        
        $classNumber = $request->input('class_number');
        if (!empty($classNumber))
        {
            $params['class_number'] = $classNumber;
        }
        
        $offset = $request->input('offset', 0);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        
        $order = $request->input('order', '');
        
        $result = $this->repository->list($params, $offset, $size, $order);
        return $this->response($result);
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function all(Request $request)
    {
        $params = [];
        
        $courseId = $request->input('course_id');
        if (!empty($courseId))
        {
            $params['course_id'] = $courseId;
        }
        
        $classNumber = $request->input('class_number');
        if (!empty($classNumber))
        {
            $params['class_number'] = $classNumber;
        }
        
        $order = $request->input('order', '');
        
        $result = $this->repository->all($params, $order);
        return $this->response($result);
    }
}
