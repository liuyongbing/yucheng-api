<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;

class GradesController extends Controller
{
    public function init()
    {
        return $this->repository = new GradesRepository();
    }
}
