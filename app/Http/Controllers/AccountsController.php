<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function init()
    {
        $this->repository = new AccountsRepository();
    }
    
    public function login(Request $request, $accountType)
    {
        $username = $request->input('username', '');
        $params = $request->all();
        
        $result = $this->repository->login($username, $accountType, $params);
        if ($result instanceof Accounts)
        {
            $status = 'success';
        }
        else
        {
            $status = 'error';
        }
        
        return $this->response($result, $status);
    }
}
