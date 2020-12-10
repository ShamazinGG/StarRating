<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/', \App\Http\Controllers\MainController::class . '@show' );
Route::get('/login', \App\Http\Controllers\MainController::class . '@login' );

Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('article', 'App\Http\Controllers\ArticleController');
Route::post('/article/{article}/rating', \App\Http\Controllers\ArticleController::class . '@rating')->name('articles.rating');




