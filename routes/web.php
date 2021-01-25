<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/imoveis', 'App\Http\Controllers\PropertyController@index');

Route::get('/imoveis/novo', 'App\Http\Controllers\PropertyController@create');
Route::post('/imoveis/store', 'App\Http\Controllers\PropertyController@store');

Route::get('/imoveis/{name}', 'App\Http\Controllers\PropertyController@show');

Route::get('/imoveis/editar/{name}', 'App\Http\Controllers\PropertyController@edit');
Route::put('/imoveis/update/{name}', 'App\Http\Controllers\PropertyController@update');

Route::get('/imoveis/remover/{name}', 'App\Http\Controllers\PropertyController@destroy');
