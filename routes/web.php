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

Route::view('/', 'layout.home')->name('home');

Route::get('/posts', 'PostController@index');

//Route::get('/posts', function() {
//    return Posts::getPosts();
//});

Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}', 'PostController@show');

Route::get('/post/edit/{post}', 'PostController@edit');



Route::get('/register', 'RegistrationController@create');

Route::get('/register/moviment', 'MovimentController@create');
Route::get('/register/leadership', 'LeadershipController@create');

Route::get('/login', 'SessionsController@create');

Route::get('/logout', 'SessionsController@destroy');



Route::post('/post/edit/{post}', 'PostController@update');

Route::post('/register/moviment', 'MovimentController@store');
Route::post('/register/leadership', 'LeadershipController@store');

Route::post('/posts', 'PostController@store');

Route::post('/posts/addComment/{post}', 'CommentsController@store');

Route::post('/register', 'RegistrationController@store');

Route::post('/login', 'SessionsController@store');