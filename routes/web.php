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

Route::get('/mensajes', ['as'=>'mensajes','uses'=>'AppController@mensajes']);
Route::get('/mensaje', ['as'=>'mensaje','uses'=>'AppController@enviarmensaje']);

Route::get('/perfil', ['as'=>'perfil','uses'=>'AppController@perfil']);
Route::post('/cambio', ['as'=>'cambio','uses'=>'AppController@cambio']);
