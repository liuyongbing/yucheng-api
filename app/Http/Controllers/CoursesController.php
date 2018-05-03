<?php

namespace App\Http\Controllers;

use App\Repositories\CoursesRepository;

class CoursesController extends Controller
{
    public function init()
    {
        $this->repository = new CoursesRepository();
    }
}
