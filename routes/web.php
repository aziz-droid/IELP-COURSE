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

Route::get('/', function () {
    return view('client.home');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/class', function () {
    return view('admin.class');
});
Route::get('/admin/verif/belum', function () {
    return view('admin.paymentbelum');
});
Route::get('/admin/verif/sudah', function () {
    return view('admin.paymentsudah');
});
Route::get('/admin/prices', function () {
    return view('admin.prices');
});
Route::get('/admin/videos', function () {
    return view('admin.videos');
});
Route::get('/admin/mentor', function () {
    return view('admin.mentor');
});
Route::get('/admin/admin', function () {
    return view('admin.admin');
});
Route::get('/admin/users', function () {
    return view('admin.users');
});
Route::get('/admin/dokumen', function () {
    return view('admin.dokumen');
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
Route::get('/login', function () {
    return view('client.login');
});
Route::get('/register', function () {
    return view('client.register');
});
Route::get('/payment', function () {
    return view('client.payment');
});
Route::get('/class', function () {
    return view('client.class');
});
Route::get('/class/content', function () {
    return view('client.classContent');
});
Route::get('/document', function () {
    return view('client.document');
});
Route::get('/videos', function () {
    return view('client.videos');
});
