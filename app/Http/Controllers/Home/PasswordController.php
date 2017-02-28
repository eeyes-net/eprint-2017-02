<?php

namespace App\Http\Controllers\Home;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('home.password.edit');
    }

    public function update()
    {
        $this->validate(request(), [
            'password' => 'required|min:6|confirmed',
        ], [
            'password.required' => '密码必填',
            'password.min' => '密码最少 :min 位',
            'password.confirmed' => '两次输入的密码不同',
        ]);
        $password_old = request('password_old');
        $password = request('password');
        if ($password_old === $password) {
            return back()->withErrors(['两次密码不能相同']);
        }
        /** @var \App\User $user */
        $user = auth()->user();
        if (!password_verify($password_old, $user->password)) {
            return back()->withErrors(['原密码不正确']);
        }
        $user->password = bcrypt($password);
        $user->save();
        return back()->with('success', ['密码修改成功']);
    }
}
