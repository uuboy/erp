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

Route::get('/', 'PagesController@root')->name('root');

Route::resource('tables','TableController');

Route::get('tables/{table}/cols/create', 'ColController@create')->name('cols.create');
Route::get('tables/{table}/cols/{col}', 'ColController@edit')->name('cols.edit');
Route::put('tables/{table}/cols/{col}', 'ColController@update')->name('cols.update');
Route::post('tables/{table}/cols', 'ColController@store')->name('cols.store');


Route::post('tables/{table}/rows', 'RowController@store')->name('rows.store');
