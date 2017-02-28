<?php

namespace App\Http\Controllers\Home;

use App\Option;

class CodeController extends Controller
{
    public function index()
    {
        if (auth()->user()->type !== 'user') {
            return back();
        }
        return view('home.code.index');
    }

    public function verify()
    {
        $user = auth()->user();
        if ($user->type !== 'user') {
            return redirect(route('home'));
        }
        $codes = Option::getOption('codes', []);
        $request_code = request('code');
        $new_codes = [];
        $saved = false;
        foreach ($codes as $code) {
            if ($code['expire'] < time()) {
                continue;
            }
            if ($code['code'] == $request_code) {
                $user->type = 'shop';
                $user->save();
                $saved = true;
                continue;
            }
            $new_codes[] = $code;
        }
        if ($saved) {
            Option::setOption('codes', $new_codes);
            return redirect(route('home'));
        }
        return back();
    }
}
