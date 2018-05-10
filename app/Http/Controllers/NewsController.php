<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    public function init()
    {
        $this->repository = new NewsRepository();
    }
}
