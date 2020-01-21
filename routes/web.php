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
    return view('Principal.index');
});
Route::get('Login','Auth\LoginController@home');
Route::resource('categorias','Sisadmin\CategoriaController');
Route::get('categorias1','Sisadmin\CategoriaController@getkus');
