<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;

class GradesController extends Controller
{
    public function init()
    {
        $this->repository = new GradesRepository();
    }
}
