<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{
    public function reserve()
    {
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
