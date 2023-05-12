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

Route::get(
    '/',
    'Controller@index'
);

Route::get(
    'productos',
    'ProductoController@show'
);

Route::get(
    'venta',
    'VentaController@index'
);

Route::get(
    'categorias',
    'CategoriaController@index'
);

Route::resource(
    'producto',
    'ProductoController'
)
->names('producto')
->except(['create', 'update']);

Route::post(
    'ventaStore',
    'VentaController@store'
)->name('venta.store');

Route::post(
    'productoUpdate',
    'ProductoController@update'
)->name('producto.update');

Route::get(
    'productoDelete/{productoId}',
    'ProductoController@destroy'
)->name('producto.delete');


Route::get(
    'consultas',
    'ConsultasController@index'
);
