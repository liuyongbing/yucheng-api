<?php
namespace App\Repositories;

use App\Models\Grades;

class GradesRepository extends Repository
{
    public function init()
    {
        return $this->model = new Grades();
    }
}