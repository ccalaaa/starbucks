<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PromoController;
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

Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/menu', [HomeController::class, 'menu']);
Route::get('/promo/{promo:id}', [HomeController::class, 'promo']);

Route::prefix('/login')->controller(AuthController::class)->name('login')->middleware(['guest'])->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'login')->name('.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('/menu', MenuController::class);
    Route::name('promos.')->group(function () {
        Route::resource('/', PromoController::class)->parameter('', 'promo');
    });
});
