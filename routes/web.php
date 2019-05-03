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
Route::resource('list', 'ProductsController');

Route::group(['middleware' => ['auth']], function(){
    //Put all of routes here
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/tiposDocumentos', 'TiposDocumentoController@index');
    Route::resource('roles', 'RolesController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('comprar', 'ComprasController');
    Route::resource('modulos', 'ModulosController');
});