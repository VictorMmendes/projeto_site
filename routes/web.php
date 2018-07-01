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

Route::get('/', 'PostagemController@listar');
Route::get('/postagem/{id}', 'PostagemController@showPostagem');
Route::post('/postagem/addComment/{id}', 'PostagemController@addComment')->middleware('auth');
Route::post('/postagem/addReply/{id}', 'PostagemController@addReply')->middleware('auth');
Route::get('/newPost', 'PostagemController@showNewPostForm')->middleware('auth');
Route::post('/newPost/createPost', 'PostagemController@createPost')->middleware('auth');
Route::get('/trending', 'PostagemController@trending');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
