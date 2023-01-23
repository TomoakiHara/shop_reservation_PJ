<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
// use App\Http\Controllers\FavoriteController;
// use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShopController::class, 'index']);
// Route::get('/search', [ShopController::class, 'search']);
Route::get('/detail', [ShopController::class, 'detail']);
Route::post('/reserve', [ReserveController::class, 'reserve']);
// Route::post('/cancel', [ReserveController::class, 'cancel']);
// Route::get('/mypage', [ReserveController::class, 'mypage']);
// Route::post('/favorite', [FavoriteController::class, 'favorite']);
// Route::get('/user', [UserController::class, 'user']);
// Route::post('/register', [UserController::class, 'register']);
// Route::get('/auth', [UserController::class, 'auth']);
// Route::get('/login', [UserController::class, 'login']);
// Route::get('/login_reserve', [UserController::class, 'login_reserve']);

// Route::get('/', function () {
//     return view('welcome');
// });
