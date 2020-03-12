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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');		

Route::group(['middleware' => 'auth'], function () {
	
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('trabajadores', 'TrabajadoresController', ['except' => ['show']]);	
	Route::resource('clientes', 'ClientesController', ['except' => ['show']]);	
	Route::resource('proveedores', 'ProveedoresController', ['except' => ['show']]);	
	Route::resource('planos', 'PlanosController', ['except' => ['show']]);	
	Route::resource('conceptos', 'ConceptosController', ['except' => ['show']]);	
	Route::resource('historial', 'HistorialController', ['except' => ['show']]);
	Route::resource('proyectos', 'ProyectosController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

