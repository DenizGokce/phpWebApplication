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

Route::get('/', 'PersonController@index');
//Custom Routes Different then Laravel Controller's Default Routes
Route::get('person/create', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::get('person/delete', 'PersonController@delete');


Route::post('person/store', 'PersonController@store');
Route::put('person/update', 'PersonController@update');
Route::delete('person/delete/{id}', 'PersonController@destroy');

Route::resource('person', 'PersonController');