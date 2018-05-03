<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\BranchesRepository;

class BranchesController extends UsersController
{
    public function init()
    {
        $this->repository = new BranchesRepository();
        
        $this->userType = Dictionary::USER_TYPE['branch'];
    }
}
