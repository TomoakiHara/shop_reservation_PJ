<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function user()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        unset($inputs['_token']);
        User::create($inputs);
        return view('thanks');
    }
    public function auth()
    {
        return view('login');
    }
    public function login(Request $request)
    {        
        $email = $request->email;
        // dd($email);
        $password = $request->password;
        // dd($password);
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
            // $text =   Auth::user()->name . 'さんがログインしました';
            return view('mypage');
        } else {
            $text = 'ログインに失敗しました';
            return view('login',['text' => $text]);
        }
    }
    public function logout()
    {
        return redirect('/');
    }
}
