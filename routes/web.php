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

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{id}-{slug}', 'postController@getByCategory')->name('category')->where('id', '[0-9]+');


Route::resource('post', 'PostController')->except(['index']);


Route::post('search','PostController@search')->name('search');

Route::resource('comment', 'CommentController');


Route::get('user/{id}', 'ProfileController@getByUser')->name('profile');
Route::get('user/{id}/comments', 'ProfileController@getCommentsByUser');
Route::get('settings', 'ProfileController@settings')->name('settings');

Route::post('settings', 'ProfileController@updateProfile')->name('settings');
