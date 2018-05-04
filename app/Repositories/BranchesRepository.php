<?php
namespace App\Repositories;

use App\Constants\Dictionary;
use App\Models\Branches;

/**
 * 分馆 repository
 * 
 * 分馆是一种用户
 */
class BranchesRepository extends UsersRepository
{
    public function init()
    {
        $this->model = new Branches();
        
        $this->userType = Dictionary::USER_TYPE['branch'];
    }
}