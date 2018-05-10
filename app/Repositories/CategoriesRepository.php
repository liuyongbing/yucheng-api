<?php
namespace App\Repositories;

use App\Models\Categories;

class CategoriesRepository extends Repository
{
    public function init()
    {
        $this->model = new Categories();
    }
}