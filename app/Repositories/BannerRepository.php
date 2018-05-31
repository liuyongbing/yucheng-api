<?php
namespace App\Repositories;

use App\Models\Banner;

class BannerRepository extends Repository
{
    public function init()
    {
        $this->model = new Banner();
    }
}