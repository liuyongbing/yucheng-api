<?php
namespace App\Repositories;

use App\Models\Accounts;

/**
 * 账号 repository
 * 
 */
class AccountsRepository extends Repository
{
    public function init()
    {
        $this->model = new Accounts();
    }
    
    /**
     * 新增
     *
     * @param array $data
     * @return \App\Models\BasicModel
     */
    public function store($data)
    {
        $item = $this->model;
        
        $item->username = $data['username'];
        $item->user_type = $data['user_type'];
        $item->status = 1;
        
        $item->save();
        
        return $item;
    }
}