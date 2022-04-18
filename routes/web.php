<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
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

Auth::routes();

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/slug/{slug}', [MainController::class, 'getNewsByCategory']);

Route::controller(NewsController::class)->group(function () {
    Route::get('/news', 'index')->name('news')->middleware('role:admin');
    Route::get('/news/create', 'create')->middleware('auth');
    Route::get('news/{news}/edit', 'edit')->middleware('auth');
    Route::get('news/{news}/delete', 'delete')->middleware('auth');
    Route::post('news', 'store')->middleware('auth');
    Route::put('news/{news}', 'update')->name('update-news')->middleware('auth');
});

Route::middleware(['role:admin'])->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index')->name('categories');
        Route::get('categories/create', 'create')->middleware('auth');
        Route::get('categories/{category}/edit', 'edit')->middleware('auth');
        Route::get('categories/{category}/delete', 'delete')->middleware('auth');
        Route::post('categories', 'store')->middleware('auth');
        Route::put('categories/{category}', 'update')->name('update-category')->middleware('auth');
    });
});

