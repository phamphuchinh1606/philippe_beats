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

Route::get('/venues', 'VenueController@index')->name('venue.index');
Route::get('/venues/create', 'VenueController@showCreate')->name('venue.create');
Route::post('/venues/create', 'VenueController@store')->name('venue.create');
Route::get('/venues/show/{id}', 'VenueController@show')->name('venue.show');
Route::get('/venues/edit/{id}', 'VenueController@showEdit')->name('venue.edit');
Route::post('/venues/edit/{id}', 'VenueController@edit')->name('venue.edit');
Route::delete('/venues/delete/{id}', 'VenueController@destroy')->name('venue.delete');
