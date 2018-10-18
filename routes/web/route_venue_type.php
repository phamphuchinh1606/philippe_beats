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

Route::get('/venue-type', 'VenueTypeController@index')->name('venue_type.index');
Route::get('/venue-type/create', 'VenueTypeController@showCreate')->name('venue_type.create');
Route::post('/venue-type/create', 'VenueTypeController@store')->name('venue_type.create');
Route::get('/venue-type/edit/{id}', 'VenueTypeController@showEdit')->name('venue_type.edit');
Route::post('/venue-type/edit/{id}', 'VenueTypeController@edit')->name('venue_type.edit');
Route::get('/venue-type/show/{id}', 'VenueTypeController@show')->name('venue_type.show');
Route::delete('/venue-type/delete/{id}', 'VenueTypeController@destroy')->name('venue_type.delete');
