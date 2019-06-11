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

Route::get('/', 'HomeController@index')->name('home.index');

Auth::routes();

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/post', 'PostsController@store')->name('post');
Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::get('/post/{post}', 'PostsController@show')->name('post.show');

Route::post('/comment', 'CommentsController@store')->name('comment');

Route::get('/category/{category}', 'CategoriesController@show')->name('category.show');


//admin part
Route::namespace('Admin')->prefix('dashboard')->group(function() {
	Route::get('/', 'AdminController@index')->name('dashboard.index');

	Route::get('/users', 'UserController@index')->name('dashboard.users');
	Route::get('/roles', function () {
		return 'Hello World';
	});
	Route::get('/posts', function () {
		return 'Hello World';
	});
	Route::get('/categories', function () {
		return 'Hello World';
	});
	Route::get('/comments', function () {
		return 'Hello World';
	});
});
