<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function create()
    {
        return view('auth.register');
    }

    protected function store()
    {
        $this->validate(request(), [
            'username' => 'required|digits:11|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'username.required' => '账号（手机号）必填',
            'username.digits' => '手机号格式不正确',
            'username.unique' => '此手机已存在',
            'password.required' => '密码必填',
            'password.min' => '密码最少 :min 位',
            'password.confirmed' => '两次输入的密码不同',
        ]);
        $user = User::create([
            'username' => request('username'),
            'password' => bcrypt(request('password')),
            'name' => request('name') ?: request('username'),
            'type' => 'user',
        ]);
        Auth::login($user);
        return redirect('/');
    }
}
