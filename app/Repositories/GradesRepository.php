<?php
namespace App\Repositories;

use App\Models\Grades;

class GradesRepository extends Repository
{
    public function init()
    {
        $this->model = new Grades();
    }
}