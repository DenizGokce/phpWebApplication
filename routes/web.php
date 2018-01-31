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
    return redirect('person');
});
//Custom Routes Different then Laravel Controller's Default Routes
Route::get('person/create', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::get('person/delete', 'PersonController@delete');

Route::resource('person', 'PersonController');