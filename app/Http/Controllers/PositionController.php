<?php

namespace App\Http\Controllers;

use App\Repositories\PositionRepository;

class PositionController extends Controller
{
    public function init()
    {
        $this->repository = new PositionRepository();
    }
}
