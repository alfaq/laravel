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

Auth::routes();

Route::get('/profile/{user}', 'ProfilesController@index')->name('profiles.show');

Route::get('/post/{post}', 'PostsController@show')->name('post.show');
Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::post('/post', 'PostsController@store')->name('post');
