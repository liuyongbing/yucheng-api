<?php

namespace App\Http\Controllers;

use App\Repositories\TeachingsRepository;

class TeachingsController extends Controller
{
    public function init()
    {
        $this->repository = new TeachingsRepository();
    }
}
