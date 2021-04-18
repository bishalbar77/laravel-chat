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
Route::get('/', 'ChatsController@index');
Route::get('/chats', 'ChatsController@index');
Route::get('/chats/private/{id}', 'ChatsController@pcahts');

Route::get('/messages', 'ChatsController@fetchMessages');
Route::get('/private', 'ChatsController@private');
Route::post('/messages', 'ChatsController@sendMessage');
Route::post('/pmessages', 'ChatsController@sendprivateMessage');
Auth::routes();

Route::get('/home', 'ChatsController@index');
