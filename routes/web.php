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
    return view('client.home');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/training', function () {
    return view('client.training');
});
Route::get('/pricing', function () {
    return view('client.pricing');
});
Route::get('/contact', function () {
    return view('client.contact');
});
