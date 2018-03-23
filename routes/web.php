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

Route::get('traerpersonal', 'PostsController@traerpersonal');
Route::post('guardarBD', 'PostsController@guardar');
Route::get('buscar', 'PostsController@buscar');
Route::post('editar', 'PostsController@editar');

//rutas de personal
Route::get('personal', 'PostsController@mostrarvistapersonal');
Route::post('editarpersonal', 'PostsController@editarpersonal');
Route::get('actualizapersonal', 'PostsController@actualpersonal');
Route::post('crearpersonal', 'PostsController@crearpersonal');
Route::post('insertarpersonal', 'PostsController@insertarpersonal');
//folios
Route::get('cierre', 'PostsController@mostrarcierre');

Route::get('howto', function (){

    return view('howto');

});

Route::group(['middleware'=> 'Role:admin'], function(){

    Route::get('posts/delete/{id}', 'PostsController@destroy');

    Route::post('posts', 'PostsController@store');
    

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
    Route::get('users/guardaruser', 'UsersController@guardaruser');

});
