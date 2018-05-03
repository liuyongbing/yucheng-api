<?php
namespace App\Repositories;

use App\Models\Trainers;

/**
 * 教练 repository
 * 
 * 教练是一种用户
 */
class TrainersRepository extends UsersRepository
{
    public function init()
    {
        $this->model = new Trainers();
    }
}