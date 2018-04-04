<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request, StudentRepository $repository)
    {
        $result = $repository->list([]);
        return $this->response($result);
    }
    
    public function show($id, StudentRepository $repository)
    {
        $item = $repository->getById($id);
        return $this->response($item);
    }
}