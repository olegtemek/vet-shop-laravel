<?php

use App\Http\Controllers\admin\AuthController as AdminAuthController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\FilterController as AdminFilterController;
use App\Http\Controllers\admin\IndexController as AdminIndexController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\front\IndexController;
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

Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminIndexController::class, 'index'])->name('home.index');
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/filter', AdminFilterController::class);
    Route::resource('/product', AdminProductController::class);
});
Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'auth'])->name('admin.login.post');

Route::group(['as' => 'front.'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('home.index');
});
