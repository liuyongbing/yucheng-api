<?php

namespace App\Http\Controllers;

use App\Repositories\TeachingsRepository;

class TeachingsController extends Controller
{
    public function init()
    {
        return $this->repository = new TeachingsRepository();
    }
}
