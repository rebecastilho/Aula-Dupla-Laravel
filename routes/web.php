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

Route::get('/cliente', 'ClienteController@index');
Route::get('/cliente/form', 'ClienteController@create');
Route::post('/cliente', 'ClienteController@store');

Route::put('vendedor/restore/{id}', 'VendedorController@restore');
Route::resource('/vendedor', 'VendedorController');