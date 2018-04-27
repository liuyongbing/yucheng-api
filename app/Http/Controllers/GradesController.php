<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

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

class GradesController extends Controller
{
    /**
     * 列表
     * 
     * @param Request $request
     * @param GradesRepository $repository
     * @return array
     */
    public function index(Request $request, GradesRepository $repository)
    {
        $result = $repository->list([]);
        return $this->response($result);
    }
    
    /**
     * 详情
     * 
     * @param int $id
     * @param GradesRepository $repository
     * @return array
     */
    public function show($id, GradesRepository $repository)
    {
        $item = $repository->detail($id);
        return $this->response($item);
    }
    
    /**
     * 新增
     * 
     * @param Request $request
     * @param GradesRepository $repository
     * @return array
     */
    public function store(Request $request, GradesRepository $repository)
    {
        $data = $request->input();
        $result = $repository->store($data);
        
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
    public function update(Request $request, GradesRepository $repository, $id)
    {
        $data = $request->input();
        $result = $repository->update($id, $data);
        
        return $this->response($result);
    }
}
