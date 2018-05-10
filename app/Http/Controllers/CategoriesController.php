<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriesRepository;

class CategoriesController extends Controller
{
    public function init()
    {
        $this->repository = new CategoriesRepository();
    }
}
