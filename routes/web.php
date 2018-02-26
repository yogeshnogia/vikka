<?php

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

Route::get('/', 'StaticController@index')->name('home');
Route::get('/time', 'StaticController@time');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


Route::get('/dashboard', 'PostsController@dashboard');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/listings', 'PostsController@store');

Route::get('/posts/listings', 'PostsController@listings');
Route::get('/posts/listings/{listing}', 'PostsController@listing');