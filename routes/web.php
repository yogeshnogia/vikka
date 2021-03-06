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
Route::get('/home', 'StaticController@index');
Route::get('/time', 'StaticController@time');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/verifyemail/{token}', 'RegistrationController@verify');
// Route::get('/register/verify/{confirmationCode}', [
// 	'as'=> 'confirmation_path',
// 	'uses' => 'RegistrationController@verify'
// ]);

Route::get('/forgot-password', 'ResetPasswordController@forgotPassword');
Route::post('/forgot-password', 'ResetPasswordController@resetPassword');
Route::get('/password-reset/{token}', 'ResetPasswordController@resetPasswordTrue');
Route::post('/password-reset/{token}', 'ResetPasswordController@resetPasswordSubmit');



Route::get('/logout', 'SessionsController@destroy');


Route::get('/dashboard', 'PostsController@dashboard');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/listings', 'PostsController@store');

Route::get('/posts/listings', 'PostsController@listings');
Route::get('/posts/listings/{listing}', 'PostsController@listing');

Route::post('/posts/listings/{id}/comments', 'CommentsController@store');