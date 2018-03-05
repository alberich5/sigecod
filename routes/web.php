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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('posts', 'PostsController@index');

Route::get('quejas', 'PostsController@queja');
Route::get('grafica', 'PostsController@grafica');
Route::get('filtro', 'PostsController@filtro');
Route::get('status', 'PostsController@status');

//servicios gernerales
Route::get('salida', 'PostsController@salida');
Route::get('entrada', 'PostsController@entrada');
Route::get('unidad', 'UnidadController@index');
Route::get('articulos', 'EntradaController@mostrar');
Route::get('cancelados', 'EntradaController@cancelados');
Route::get('canceladosvue', 'EntradaController@canceladosvue');
Route::get('verificarproducto', 'EntradaController@verificarproducto');
Route::get('reactivar', 'EntradaController@reactivar');
Route::get('mostrarsalidas', 'SalidaController@mostrarsalidas');
Route::get('graficavue', 'GraficaController@index');
Route::get('cargarcancelados', 'GraficaController@cargararticulosCancelados');
Route::get('cargarclientes', 'ClienteController@cargar');

Route::get('mosclientes', 'ClienteController@mostrar');
Route::get('mostraruser', 'UsersController@mostrar');
Route::get('mosalidas', 'SalidaController@mostrar');
Route::get('mostrararticulos', 'EntradaController@mostrarArticulos');
Route::get('guardarSalida', 'SalidaController@guadar');
Route::post('guardarBD', 'SalidaController@guardar');
Route::get('pruebas', 'SalidaController@pruebas');
Route::get('crear', 'SalidaController@crearWord');
Route::get('especifico', 'SalidaController@especifico');
Route::get('historial', 'SalidaController@historial');


//ruta de Excel
Route::get('/export-users', 'ExcelController@exportUsers');
Route::get('/export-entradas', 'ExcelController@exportEntradas');
Route::get('/export-salidas', 'ExcelController@exportSalidas');
Route::get('/export-productos', 'ExcelController@exportProducto');
Route::get('/export-mensual', 'ExcelController@exportMensual');
Route::get('/export-cancelado', 'ExcelController@exportCancelados');
Route::get('/export-prueba', 'ExcelController@pruebaexcel');
//consumir
Route::get('traerUnidad', 'UnidadController@traerUnidad');
Route::get('traerCliente', 'ClienteController@traerCliente');
Route::get('pendientes', 'PostsController@pendiente');
Route::get('cliente', 'PostsController@cliente');

Route::get('howto', function (){

    return view('howto');

});

Route::group(['middleware'=> 'Role:admin'], function(){

    Route::get('posts/delete/{id}', 'PostsController@destroy');

    Route::post('posts', 'PostsController@store');
    Route::get('/clientes', 'ClienteController@guardar');
    Route::get('/unidades', 'UnidadController@guardar');
    Route::get('/entradas', 'EntradaController@guardar');

    Route::get('/posts/editposts/{id}', 'PostsController@show');

    Route::post('/posts/editposts/{id}', 'PostsController@update');

    Route::get('/users/editprofile/{id}', 'UsersController@show');
    Route::get('/eliminarArticulo/{id}', 'EntradaController@eliminar');

    Route::post('/users/editprofile/{id}', 'UsersController@update');

    Route::get('users/delete/{id}', 'UsersController@destroy');

    Route::get('users/deleteaccount/{id}', 'UsersController@accountDown');

});

Route::group(['middleware'=> 'Role:admin'], function(){

    Route::get('users/manageprofiles', 'UsersController@index');

});
