<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function init()
    {
        $this->repository = new UsersRepository();
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        $offset = (int)($page-1) * $size;
        
        $params = [
            'user_type' => $this->repository->userType
        ];
        $result = $this->repository->list($params, $offset, $size);
        
        return $this->response($result);
    }
    
    public function login(Request $request)
    {
        $username = $request->input('username', '');
        $params = $request->all();
//echo '<pre>';print_r($params);exit();
        $result = $this->repository->login($username, $params);
        return $this->response($result);
    }
}
