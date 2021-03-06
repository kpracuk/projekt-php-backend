<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/auth/user', function (Request $request) {
    return $request->user();
})->middleware('auth');

Route::resource('/api/products', \App\Http\Controllers\ProductController::class)->only(['index']);
Route::resource('/api/orders', \App\Http\Controllers\OrderController::class)->only(['index', 'store', 'update']);
