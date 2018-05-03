<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\TrainersRepository;

class TrainersController extends UsersController
{
    public function init()
    {
        $this->repository = new TrainersRepository();
        
        $this->userType = Dictionary::USER_TYPE['trainer'];
    }
}
