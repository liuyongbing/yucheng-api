<?php

namespace App\Http\Controllers;

use App\Repositories\TrainersRepository;

class TrainersController extends UsersController
{
    public function init()
    {
        $this->repository = new TrainersRepository();
    }
}
