<?php

namespace App\Http\Controllers\Home\Shop;

use App\Http\Controllers\Home\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        dd(auth()->user());
        if (!auth()->user()->isShop()) {
            redirect(route('home'));
        }
    }
}
