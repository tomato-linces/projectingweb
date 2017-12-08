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

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/calidad', function () {
    return view('calidad');
});



Route::get('/perfil','PerfilController@index')->name('perfil');

//Rutas Productos
//Ruta para la sección de elegir productos y agregarlos a la requisición
Route::get('/productos','ProductosController@index')->name('productos');
Route::get('/productos/getProductos', 'ProductosController@getProductos');
Route::get('/productos/cancelRequisicion', 'ProductosController@cancelRequisicion');

//Rutas Requisiciones
Route::post('/requisiciones/saveRequisicion', 'RequisicionesController@saveRequisicion');
Route::post('/requisiciones/saveLineas', 'RequisicionesController@saveLineas');
Route::post('/requisiciones/saveDireccion', 'RequisicionesController@saveDireccion');

Route::get('/Entradas/bodega', 'EntradaController@index');
Route::post('/Entradas/guardar', 'EntradaController@guardar');
Route::resource('almacenes','AlmacenesController');

Route::get('/cambiarperfil','CambiarPerfilController@index')->name('cambiar perfil');

Route::get('/catalogo','CatalogoController@index')->name('catalogo');
Route::get('/catalogo/getProductosCat', 'CatalogoController@getProductos');

Route::get('/getRequisicionEstado', 'RequisicionEstadoController@getRequisicionEstado');
Route::get('/getRequisicionEstadoFaltantes', 'RequisicionEstadoController@getRequisicionEstadoFaltantes');
Route::get('/getRequisicionEstadoConsulta', 'RequisicionEstadoController@getRequisicionEstadoConsulta');
