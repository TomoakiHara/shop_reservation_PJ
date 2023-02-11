<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Reserve;
use App\Models\Favorite;


class UserController extends Controller
{
    public function user()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $name = $request->name;
        // dd($name);
        $email = $request->email;
        // dd($email);
        $password = $request->password;
        // dd($password);
        $inputs = ['name' => $name, 'email' => $email,
            'password' => Hash::make($password)];
        // $inputs = $request->all();
        // dd($inputs);
        // unset($inputs['_token']);
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
            $text = Auth::user()->name . 'さん';
            // dd($text);
            $reserves = Reserve::all();
            // dd($reserves);
            $favorites = Favorite::all();
            // dd($favorites);
            $param = ['text' => $text, 'reserves' => $reserves, 'favorites' => $favorites];
            return view('mypage', $param);
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
