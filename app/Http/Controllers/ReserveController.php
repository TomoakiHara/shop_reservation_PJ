<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class ReserveController extends Controller
{
    public function reserve(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        unset($inputs['_token']);
        Reserve::create($inputs);
        return view('reserve');
    }

    public function mypage()
    {
        $user = Auth::user();
        // dd($user);
        $text = Auth::user()->name . 'さん';
        // dd($text);
        $reserves = Reserve::all();
        // dd($reserves);
        $favorites = Favorite::all();
        // dd($favorites);
        $param = ['user' => $user, 'text' => $text, 'reserves' => $reserves, 'favorites' => $favorites];
            return view('mypage', $param);
    }

    public function cancel(Request $request)
    {
        $input = $request->all();
        // dd($request);
        // dd($input);
        unset($input['_token']);
        Reserve::where('id', $request->id)->delete($input);
        return redirect('/mypage');
    }
}
