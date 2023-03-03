<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
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

    public function register(UserRequest $request)
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
            $user = Auth::user();
            // dd($user);
            $text = Auth::user()->name . 'さん';
            // dd($text);
            $reserves = Reserve::where('user_id', $user->id) -> get();
            // dd($reserves);
            $favorites = Favorite::where('user_id', $user->id) -> get();
            // dd($favorites);
            $param = ['user' => $user, 'text' => $text, 'reserves' => $reserves, 'favorites' => $favorites];
            return view('mypage', $param);
        } else {
            $text = 'メールアドレスまたはパスワードが間違っています';
            return view('login',['text' => $text]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/auth');
    }
}
