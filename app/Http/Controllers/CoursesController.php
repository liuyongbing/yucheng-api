<?php

namespace App\Http\Controllers;

use App\Repositories\CoursesRepository;

class CoursesController extends Controller
{
    public function getRepository()
    {
        return new CoursesRepository();
    }
}
