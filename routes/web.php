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
Auth::routes();

Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('homes');
Route::get('/about_us',[\App\Http\Controllers\Front\IndexController::class,'about_us'])->name('about_us');
Route::get('/feedback',[\App\Http\Controllers\Front\IndexController::class,'feedback'])->name('feedback');
