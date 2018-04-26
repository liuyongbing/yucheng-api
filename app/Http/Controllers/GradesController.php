<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

/**
 * +--------+-----------+-------------------------+------------------+------------------------------------------------+--------------+
 * | Domain | Method    | URI                     | Name             | Action                                         | Middleware   |
 * +--------+-----------+-------------------------+------------------+------------------------------------------------+--------------+
 * |        | GET|HEAD  | users                   | users.index      | App\Http\Controllers\UsersController@index     | web          |
 * |        | POST      | users                   | users.store      | App\Http\Controllers\UsersController@store     | web          |
 * |        | GET|HEAD  | users/create            | users.create     | App\Http\Controllers\UsersController@create    | web          |
 * |        | GET|HEAD  | users/{user}            | users.show       | App\Http\Controllers\UsersController@show      | web          |
 * |        | PUT|PATCH | users/{user}            | users.update     | App\Http\Controllers\UsersController@update    | web          |
 * |        | DELETE    | users/{user}            | users.destroy    | App\Http\Controllers\UsersController@destroy   | web          |
 * |        | GET|HEAD  | users/{user}/edit       | users.edit       | App\Http\Controllers\UsersController@edit      | web          |
 * +--------+-----------+-------------------------+------------------+------------------------------------------------+--------------+
 */

class GradesController extends Controller
{
    /**
     * 班级列表
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
     * 班级详情
     * 
     * @param int $id
     * @param GradesRepository $repository
     * @return array
     */
    public function show($id, GradesRepository $repository)
    {
        $item = $repository->getById($id);
        return $this->response($item);
    }
    
    /**
     * 新增班级
     */
    public function store()
    {
        return __METHOD__;
    }
    
    public function update()
    {
        return __METHOD__;
    }
}
