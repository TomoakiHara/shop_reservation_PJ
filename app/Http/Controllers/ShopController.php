<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        // dd($shops);
        $areas = Area::all();
        // dd($areas);
        $genres = Genre::all();
        // dd($genres);
        $param = ['shops' => $shops, 'areas' => $areas, 'genres' => $genres];
        return view('shoplist', $param);
    }

    public function search()
    {
        return view('shoplist');
    }

    public function detail(Request $request)
    {
        $form = $request->all();
        // dd($request);
        // dd($form);
        $details = Shop::where('id', $request->id)->get();
        $param = [
        'details' => $details,
        ];
        // dd($param);
        return view('shopdetail', $param);
    }
}
