<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    public function init()
    {
        $this->repository = new NewsRepository();
    }
    
    public function years()
    {
        $result = $this->repository->years();
        return $this->response($result);
    }
}
