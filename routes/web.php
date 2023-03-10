<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
    return view('home', [
        'title' => 'Project LKS'
    ]);
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::post('login/register_proses', 'register_proses');
    Route::get('register', 'register');
    Route::get('logout', 'logout');
});

Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:1']], function () {
        Route::controller(BarangController::class)->group(function () {
            Route::get('dataBarang', 'index')->name('dataBarang');
            Route::get('tambahBarang', 'create')->name('tambahBarang');
            Route::post('store', 'store')->name('store');
            Route::get('show/{id}', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });
        Route::controller(UserController::class)->group(function () {
            Route::get('user', 'index')->name('user');
            Route::get('/create', 'create');
        });
    });
});
