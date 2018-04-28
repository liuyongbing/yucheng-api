<?php
namespace App\Repositories;

use App\Models\Grades;

class GradesRepository extends Repository
{
    public function getModel()
    {
        return new Grades();
    }
}