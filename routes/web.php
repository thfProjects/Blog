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
Route::get('/create', 'BlogController@create')->middleware(['auth', 'admin:0']);
Route::post('/home', 'BlogController@store')->middleware(['auth', 'admin:0']);
Route::get('/blogs/{id}', 'BlogController@show');
Route::delete('/blogs/{id}', 'BlogController@destroy')->middleware(['auth', 'author_or_admin']);
Route::get('/edit/{id}', 'BlogController@edit')->middleware(['auth', 'author']);
Route::patch('/blogs/{id}', 'BlogController@update')->middleware(['auth', 'author']);
Route::patch('/approve/{id}', 'BlogController@approve')->middleware(['auth', 'admin:1']);
Route::get('/users', 'UserController@index')->middleware(['auth', 'admin:1']);
Route::get('/users/{id}', 'UserController@show');