<?php
namespace App\Repositories;

use App\Models\News;

class NewsRepository extends Repository
{
    public function init()
    {
        $this->model = new News();
    }
}