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

Route::resource('events','EventsController')->middleware('auth');

Route::resource('posts', 'PostsController')->middleware('auth');
Route::post('/posts/create', 'PostsController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/comments', 'CommentsController@index');
// Route::get('/comments/create', 'CommentsController@create');  // för att visa create-sidan
Route::post('/comments', 'CommentsController@store');   // för att posta från create-sidans formulär

Route::get('/home', 'HomeController@show')->name('home');
Route::get('/home/{user}/edit', 'HomeController@edit');
Route::patch('/home/{user}', 'HomeController@update');
Route::delete('/home/{user}', 'HomeController@destroy');
