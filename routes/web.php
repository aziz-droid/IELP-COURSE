<?php

use App\Http\Controllers\AdminClassController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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
Route::get('/admin/class', [AdminClassController::class, 'index']);
Route::get('/admin/class/{id}', [AdminClassController::class, 'getById']);
Route::post('/admin/class', [AdminClassController::class, 'create']);
Route::put('/admin/class/{classroom}', [AdminClassController::class, 'update']);
Route::delete('/admin/class/{classroom}', [AdminClassController::class, 'delete']);
Route::get('/admin/verif/belum', [PaymentController::class, 'index']);
Route::put('/admin/verif/belum/{user}', [PaymentController::class, 'verifUpdate']);
Route::get('/admin/verif/sudah', [PaymentController::class, 'sudahVerif']);
Route::put('/admin/verif/sudah/{user}', [PaymentController::class, 'unverifUpdate']);
Route::get('/admin/prices', [PriceController::class, 'index']);
Route::get('/admin/prices/{id}', [PriceController::class, 'getById']);
Route::post('/admin/prices', [PriceController::class, 'create']);
Route::put('/admin/prices/{price}', [PriceController::class, 'update']);
Route::delete('/admin/prices/{price}', [PriceController::class, 'delete']);
Route::get('/admin/desc', [PriceController::class, 'getDesc']);
Route::post('/admin/desc', [PriceController::class, 'updateDesc']);
Route::get('/admin/videos', [VideoController::class, 'index']);
Route::get('/admin/videos/{id}', [VideoController::class, 'getById']);
Route::put('/admin/videos/{video}', [VideoController::class, 'update']);
Route::delete('/admin/videos/{video}', [VideoController::class, 'delete']);
Route::post('/admin/videos', [VideoController::class, 'create']);
Route::get('/admin/mentor', [MentorController::class, 'index']);
Route::get('/admin/mentor/{mentor}', [MentorController::class, 'getById']);
Route::put('/admin/mentor/{mentor}', [MentorController::class, 'update']);
Route::delete('/admin/mentor/{mentor}', [MentorController::class, 'delete']);
Route::post('/admin/mentor', [MentorController::class, 'create']);
Route::get('/admin/admin', [UserController::class, 'admin']);
Route::get('/admin/admin/{user}', [UserController::class, 'getById']);
Route::put('/admin/admin/{user}', [UserController::class, 'update']);
Route::delete('/admin/admin/{user}', [UserController::class, 'delete']);
Route::post('/admin/admin', [UserController::class, 'create']);
Route::get('/admin/users', [UserController::class, 'user']);
Route::delete('/admin/users/{user}', [UserController::class, 'deleteUser']);
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
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'registerPost']);
Route::get('/payment', [PaymentController::class, 'buktiShow']);
Route::post('/payment/{user}', [PaymentController::class, 'buktiPost']);
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
Route::get("/logout", [AuthController::class, "logout"]);
