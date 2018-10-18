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

Route::get('/events', 'EventController@index')->name('event.index');
Route::get('/events/create', 'EventController@showCreate')->name('event.create');
Route::post('/events/create', 'EventController@store')->name('event.create');
Route::get('/events/edit/{id}', 'EventController@showEdit')->name('event.edit');
Route::post('/events/edit/{id}', 'EventController@edit')->name('event.edit');
