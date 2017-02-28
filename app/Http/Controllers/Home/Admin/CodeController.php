<?php

namespace App\Http\Controllers\Home\Admin;

use App\Http\Controllers\Controller;
use App\Option;

class CodeController extends Controller
{
    public function create()
    {
        return view('home.admin.code.create');
    }

    public function store()
    {
        $code = mt_rand(10000, 9999999);
        $expire = time() + 600;
        $codes = Option::getOption('codes', []);
        $codes[] = compact('code', 'expire');
        Option::setOption('codes', $codes);
        return view('home.admin.code.create', compact('code'));
    }
}
