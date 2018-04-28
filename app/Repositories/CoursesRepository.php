<?php
namespace App\Repositories;

use App\Models\Courses;

class CoursesRepository extends Repository
{
    public function getModel()
    {
        return new Courses();
    }
}