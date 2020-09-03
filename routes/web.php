<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index', 'SongsController@index');
Route::post('/index', 'SongsController@store');
Route::get('/create', 'SongsController@create');
Route::get('/show/{songs}', 'SongsController@show');
Route::get('/show/{songs}/edit', 'SongsController@edit');
Route::put('/show/{songs}', 'SongsController@update');
Route::get('/delete/{songs}/delete', 'SongsController@destroy');
