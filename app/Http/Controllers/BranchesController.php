<?php

namespace App\Http\Controllers;

use App\Repositories\BranchesRepository;

class BranchesController extends UsersController
{
    public function init()
    {
        $this->repository = new BranchesRepository();
    }
}
