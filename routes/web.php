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

Route::get('/home', 'BlogController@index')->name('home');
Route::get('/create', 'BlogController@create');
Route::post('/home', 'BlogController@store');
Route::get('/blogs/{id}', 'BlogController@show');
Route::delete('/blogs/{id}', 'BlogController@destroy');
Route::get('/edit/{id}', 'BlogController@edit');
Route::patch('/blogs/{id}', 'BlogController@update');
Route::patch('/approve/{id}', 'BlogController@approve');
Route::get('/users', 'UserController@index');
Route::get('/users/{id}', 'UserController@show');