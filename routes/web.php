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
//categorias
Route::resource('categorias','Sisadmin\CategoriaController');
Route::get('categorias1','Sisadmin\CategoriaController@getkus');
//productos
Route::resource('Productos','Sisadmin\ProductoController');
Route::post('UpdateProductos/{id}','Sisadmin\ProductoController@actualizar');
//accesorios
Route::resource('Accesorios','Sisadmin\AccesorioController');
Route::get('getAccesorios','Sisadmin\AccesorioController@getAccesorios');
Route::post('crearAccsesorios','Sisadmin\AccesorioController@crearr');
Route::post('UpdateAccesorios/{id}','Sisadmin\AccesorioController@UpdateAccesorios');
Route::get('detalleAccesorios/{id}','Sisadmin\AccesorioController@detalleAccesorios');
Route::post('DeleteAccesXPro','Sisadmin\AccesorioController@DeleteAccesXPro');
//ofertas
Route::resource('Ofertas','Sisadmin\OfertaController');
//servicios
Route::resource('Servicios','Sisadmin\ServicioController');
Route::get('/','Sisadmin\ServicioController@listarserviciosprincipal');
//buscar dni
Route::post('Buscardni','Principal\BuscarController@buscardni');
Route::post('Buscarruc','Principal\BuscarController@Buscarruc');

