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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', function () {
    return view('counter');
});

Route::post('/counter', function () {
    return view('counter');
});

Route::resource('events','eventsController');

Route::resource('posts', 'Postscontroller');
Route::post('/posts/create', 'Postscontroller@create');
/*Route::get('/posts', 'Postscontroller@index');
Route::get('/posts/{post}', 'Postscontroller@show'); //
Route::post('/posts', 'Postscontroller@store');
Route::get('/posts/{post}/edit', 'Postscontroller@edit'); //
Route::patch('/posts/{post}', 'Postscontroller@update'); //
Route::delete('/posts/{post}', 'Postscontroller@destroy'); //*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
