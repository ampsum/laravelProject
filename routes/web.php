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

Route::resource('events','eventsController')->middleware('auth');

Route::resource('posts', 'Postscontroller')->middleware('auth');
Route::post('/posts/create', 'Postscontroller@create');

Auth::routes();

Route::get('/home', 'HomeController@show')->name('home');
Route::get('/home/{user}/edit', 'HomeController@edit');
Route::patch('/home/{user}', 'HomeController@update');
Route::delete('/home/{user}', 'HomeController@destroy');
