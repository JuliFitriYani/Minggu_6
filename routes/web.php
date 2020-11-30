<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::get('admin', [HomeController::class, 'showAdmin']);
Route::get('product', [HomeController::class, 'showProduct']);
Route::get('user', [HomeController::class, 'showuser']);
Route::get('contact', [HomeController::class, 'showContact']);
Route::get('about', [HomeController::class, 'showAbout']);

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

Route::post('produk/filter', [ProdukController::class, 'filter']);
Route::resource('produk', ProdukController::class);
Route::resource('user', UserController::class);
