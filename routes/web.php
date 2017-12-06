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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tomate', function () {
    return view('tomate');
});

Route::get('/perfil','PerfilController@index')->name('perfil');

//Rutas Productos
//Ruta para la sección de elegir productos y agregarlos a la requisición
Route::get('/productos','ProductosController@index')->name('productos');
Route::get('/productos/getProductos', 'ProductosController@getProductos');
Route::get('/productos/cancelRequisicion', 'ProductosController@cancelRequisicion');
Route::get('/Entradas/bodega', 'EntradaController@index');
Route::post('/Entradas/guardar', 'EntradaController@guardar');
Route::resource('almacenes','AlmacenesController');