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

Route::get('/detalles', function () {
    return view('productsdescription');
 });
 Route::get('/confirmar-pago', function () {
    return view('checkout');
 });
 Route::resource('productos', 'ProductsController');


Route::group(['middleware' => ['auth']], function(){
    //Put all of routes here
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/productos', 'ProductosController@index');
    Route::resource('roles', 'RolesController');
});