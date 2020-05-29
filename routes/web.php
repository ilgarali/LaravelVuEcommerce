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

Route::name('admin.')->prefix('admin')->namespace('Back')->middleware('is_admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('/category', 'CategoryController');
    Route::post('/fetch', 'CategoryController@fetch')->name('fetch');
    Route::post('/fetchDelete', 'CategoryController@fetchDelete')->name('fetchDelete');
    Route::resource('/post', 'PostController');
  
    
});


Route::get('/{any?}', 'HomeController@index')->name('home')->where('name', '[A-Za-z]+');