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

Route::get('/actions', 'ActionController@index')->name('action.index');
Route::get('/actions/create', 'ActionController@showCreate')->name('action.create');
Route::post('/actions/create', 'ActionController@store')->name('action.create');
Route::get('/actions/show/{id}', 'ActionController@show')->name('action.show');
Route::get('/actions/edit/{id}', 'ActionController@showEdit')->name('action.edit');
Route::post('/actions/edit/{id}', 'ActionController@edit')->name('action.edit');
Route::delete('/actions/delete/{id}', 'ActionController@destroy')->name('action.delete');
