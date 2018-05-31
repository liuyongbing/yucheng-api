<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\PositionRepository;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function init()
    {
        $this->repository = new PositionRepository();
    }
}
