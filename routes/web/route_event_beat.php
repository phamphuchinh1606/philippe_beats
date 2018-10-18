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

Route::get('/event-beat', 'EventBeatController@index')->name('event_beat.index');
Route::get('/event-beat/create', 'EventBeatController@showCreate')->name('event_beat.create');
Route::post('/event-beat/create', 'EventBeatController@store')->name('event_beat.create');
Route::get('/event-beat/show/{id}', 'EventBeatController@show')->name('event_beat.show');
Route::get('/event-beat/edit/{id}', 'EventBeatController@showEdit')->name('event_beat.edit');
Route::post('/event-beat/edit/{id}', 'EventBeatController@edit')->name('event_beat.edit');
Route::delete('/event-beat/delete/{id}', 'EventBeatController@destroy')->name('event_beat.delete');
