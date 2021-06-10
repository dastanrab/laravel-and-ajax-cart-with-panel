<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'App\Http\Controllers\ProductsController@index');

Route::get('cart', 'App\Http\Controllers\ProductsController@cart');
Route::get('insert', function (){
    return view('insert');

});
Route::get('sss', function (){
    return view('sss');

});
Route::get('update/{id}', 'App\Http\Controllers\ProductsController@upd');
Route::get('sss', 'App\Http\Controllers\ProductsController@show');
Route::post('create','App\Http\Controllers\ProductsController@create');
Route::post('upd2','App\Http\Controllers\ProductsController@sos');

Route::get('add-to-cart/{id}', 'App\Http\Controllers\ProductsController@addToCart');
Route::patch('update-cart', 'App\Http\Controllers\ProductsController@update');

Route::delete('remove-from-cart', 'App\Http\Controllers\ProductsController@remove');
Route::delete('remove', 'App\Http\Controllers\ProductsController@delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
