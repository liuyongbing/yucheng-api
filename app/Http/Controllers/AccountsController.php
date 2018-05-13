<?php

namespace App\Http\Controllers;

use App\Repositories\AccountsRepository;

class AccountsController extends Controller
{
    public function init()
    {
        $this->repository = new AccountsRepository();
    }
}
