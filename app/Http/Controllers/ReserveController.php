<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{
    public function reserve(Request $request)
    {
        // if () {
        // return view('/register')
        // }

        $inputs = $request->all();
        dd($inputs);
        unset($inputs['_token']);

        Reserve::create($inputs);
        return view('reserve');
    }

    public function mypage()
    {
        return view('mypage');
    }

    public function cancel()
    {
        return view('mypage');
    }
}
