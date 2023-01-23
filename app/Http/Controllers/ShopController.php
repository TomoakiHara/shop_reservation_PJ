<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shoplist');
    }

    public function search()
    {
        return view('shoplist');
    }

    public function detail()
    {
        return view('shopdetail');
    }
}
