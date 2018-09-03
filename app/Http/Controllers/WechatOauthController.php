<?php

namespace App\Http\Controllers;

use App\Repositories\WechatOauthRepository;

class WechatOauthController extends Controller
{
    public function init()
    {
        $this->repository = new WechatOauthRepository();
    }
}
