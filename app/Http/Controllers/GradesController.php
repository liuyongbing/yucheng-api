<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;

class GradesController extends Controller
{
    public function getRepository()
    {
        return new GradesRepository();
    }
}
