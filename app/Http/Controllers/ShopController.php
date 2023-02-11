<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        // dd($login_id);
        if($user == null) {
        $favorites = Favorite::all();
        }else{
        $favorites = Favorite::where('user_id', $user->id) -> get();
        }
        // dd($favorites);
        $param = ['shops' => $shops, 'areas' => $areas, 'genres' => $genres,'favorites' => $favorites, 'user' => $user];
        // dd($param);
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
