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

Route::get('/', 'UserControlller@index');
Route::post('users', 'UserControlller@store')->name('users.store');
Route::delete('users/{user}', 'UserControlller@destroy')->name('users.destroy');

