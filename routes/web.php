<?php

use Illuminate\Support\Facades\Route;

Route::get('/','StaticController@index');
Route::get('/about', 'StaticController@about'); 
Route::get('/blog', 'StaticController@blog');

Route::get('/shop','ItemsController@index');
Route::get('/items/{item}','ItemsController@show');

Route::resource('articles','ArticlesController'); 


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
