<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;

class CoursesController extends Controller
{
    public function getRepository()
    {
        return new Repository();
    }
}
