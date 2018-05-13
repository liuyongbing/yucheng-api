<?php

namespace App\Http\Controllers;

use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function init()
    {
        $this->repository = new AccountsRepository();
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
