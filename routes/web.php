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
})->name('welcome');

// Blog
Route::get('/blog', 'PostsController@index')->name('blog.index');
Route::get('/blog/add', 'PostsController@addPost')->name('blog.add');
Route::get('/blog/post/{slug}', 'PostsController@view')->name('blog.view');
Route::post('/blog/store', 'PostsController@store')->name('blog.store');
//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
