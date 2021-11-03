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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('icons',\App\Http\Controllers\IconController::class)->middleware('auth');

Route::middleware('auth')->get('/icons',function () {
    return view('pages.icons');
});
Route::middleware('auth')->get('/sets',function () {
    return view('pages.sets');
});
Route::middleware('auth')->get('/profile',function () {
    return view('pages.profile');
});
Route::middleware('auth')->get('/users',function () {
    return view('pages.users');
});


//Route::resource('icons',\App\Http\Controllers\IconController::class);
