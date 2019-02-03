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

Route::get('/welcome', function () {
    return view('welcome_basic');
})->middleware('auth.basic');

Route::get('/', ['as'=>'home','uses'=>'AppController@index']);
Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/messages', ['as'=>'messages.index','uses'=>'MessageController@index', 'middleware' => 'roles', 'roles' => ['user', 'premium', 'admin']]);
Route::get('/messages/create', ['as'=>'messages.create','uses'=>'MessageController@create', 'middleware' => 'roles', 'roles' => ['premium', 'admin']]);
Route::post('/messages', ['as'=>'messages.store','uses'=>'MessageController@store']);
Route::get('/messages/{message}', ['as'=>'messages.show','uses'=>'MessageController@show']);
Route::get('/messages/{message}/edit', ['as'=>'messages.edit','uses'=>'MessageController@edit']);
Route::get('/messages/{message}', ['as'=>'messages.update','uses'=>'MessageController@update']);
Route::get('/messages/{message}', ['as'=>'messages.detroy','uses'=>'MessageController@destroy']);

Route::get('/perfil', ['as'=>'perfil','uses'=>'AppController@perfil']);
Route::get('/usuario/tema', ['as'=>'usuario.tema','uses'=>'AppController@cambiarTema']);
Route::post('/cambio', ['as'=>'cambio','uses'=>'AppController@cambio']);
Route::post('/imagen', ['as'=>'imagen','uses'=>'AppController@imagen']);
Route::get('/admin', ['as'=>'admin','uses'=>'AppController@admin', 'middleware' => 'roles', 'roles' => ['admin']]);
