<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        $inputs = $request->all();
        // dd($request);
        // dd($form);
        unset($inputs['_token']);
        Favorite::create($inputs);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $inputs = $request->all();
        // dd($request);
        // dd($form);
        unset($inputs['_token']);
        Favorite::delete($inputs);
        return redirect('/');
    }

}
