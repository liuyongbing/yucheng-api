<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Models\BasicModel;
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
    
    public $repository = null;
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        $this->repository = new Repository();
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
        
        $order = $request->input('order', '');
        
        $result = $this->repository->list([], $offset, $size, $order);
        return $this->response($result);
    }
    
    /**
     * 详情
     *
     * @param int $id
     * @return array
     */
    public function show($id)
    {
        $item = $this->repository->detail($id);
        return $this->response($item);
    }
    
    /**
     * 新增 POST
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $result = $this->repository->store($data);
        
        return $this->response($result);
    }
    
    /**
     * 修改 PUT
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $result = $this->repository->update($id, $data);
        
        if ($result instanceof BasicModel)
        {
            $status = 'success';
        }
        else
        {
            $status = 'error';
        }
        
        return $this->response($result, $status);
    }
    
    protected function response($result, $status = 'success')
    {
        return [
            'status'    => $status,
            'code'      => isset($result['code']) ? $result['code'] : 0,
            'message'   => isset($result['message']) ? $result['message'] : '',
            'result'    => $result
        ];
    }
}
