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

//Route::resource('blog', 'Blogcontroller');
Route::get('/blog', 'Blogcontroller@index');
Route::post('/blog/create', 'Blogcontroller@create');
Route::get('/blog/{post}', 'Blogcontroller@show'); //
Route::post('/blog', 'Blogcontroller@store');
Route::get('/blog/{post}/edit', 'Blogcontroller@edit'); //
Route::patch('/blog/{post}', 'Blogcontroller@update'); //
Route::delete('/blog/{post}', 'Blogcontroller@destroy'); //

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
