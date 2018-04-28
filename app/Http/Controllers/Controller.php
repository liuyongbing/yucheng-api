<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * +-----------+-------------------+---------------+-------------------------+
 * | Method    | URI               | Name          | Action                  |
 * +-----------+-------------------+---------------+-------------------------+
 * | GET|HEAD  | users             | users.index   | UsersController@index   |
 * | POST      | users             | users.store   | UsersController@store   |
 * | GET|HEAD  | users/create      | users.create  | UsersController@create  |
 * | GET|HEAD  | users/{user}      | users.show    | UsersController@show    |
 * | PUT|PATCH | users/{user}      | users.update  | UsersController@update  |
 * | DELETE    | users/{user}      | users.destroy | UsersController@destroy |
 * | GET|HEAD  | users/{user}/edit | users.edit    | UsersController@edit    |
 * +-----------+-------------------+---------------+-------------------------+
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * 列表
     *
     * @param Request $request
     * @param GradesRepository $repository
     * @return array
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $size = $request->input('size', Dictionary::PAGE_SIZE);
        $offset = (int)($page-1) * $size;
        
        $result = $this->getRepository()->list([], $offset, $size);
        return $this->response($result);
    }
    
    /**
     * 详情
     *
     * @param int $id
     * @param GradesRepository $repository
     * @return array
     */
    public function show($id)
    {
        $item = $this->getRepository()->detail($id);
        return $this->response($item);
    }
    
    /**
     * 新增
     *
     * @param Request $request
     * @param GradesRepository $repository
     * @return array
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $result = $this->getRepository()->store($data);
        
        return $this->response($result);
    }
    
    /**
     * 修改
     *
     * @param Request $request
     * @param GradesRepository $repository
     * @param int $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $result = $this->getRepository()->update($id, $data);
        
        return $this->response($result);
    }
    
    public function getRepository()
    {
        return new Repository();
    }
    
    protected function response($result)
    {
        return [
            'status'        => 'success',
            'error_code'    => 0,
            'error_message' => '',
            'result'        => $result
        ];
    }
}
