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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('/admin/users/{user}/kick', 'KickoutController@update')->name('admin.users.kick');
Route::get('/admin/users/active', 'ActiveUsersController@index')->name('admin.users.active');
