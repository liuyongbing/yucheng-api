<?php

namespace App\Http\Controllers;

use App\Repositories\TrainersRepository;

class TrainersController extends Controller
{
    public function init()
    {
        return $this->repository = new TrainersRepository();
    }
}
