<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucTruyenController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'home']);
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai'])->name('the-loai');
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen'])->name('xem-truyen');

Route::get('/xem-chuong/{slug}', [IndexController::class, 'xemchuong'])->name('xem-chuong');

Route::get('/tim-kiem', [IndexController::class, 'timkiem'])->name('tim-kiem');

Route::get('/admin', [HomeController::class, 'index'])->name('admin');

Route::resource('/danhmuc', DanhMucTruyenController::class);

Route::resource('/Truyen', TruyenController::class);

Route::resource('/Chapter', ChapterController::class);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');