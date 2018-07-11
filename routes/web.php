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

//Route::get('vehiculo', 'VehiculoController@index')->name('vehiculo.index');
Route::resource('vehiculo','VehiculoController');

#Seguros
Route::get('vehiculo/{vehiculo}/seguro', 'SeguroController@index')->name('seguro.index');
Route::post('vehiculo/{vehiculo}/seguro', 'SeguroController@store')->name('seguro.store');
Route::get('vehiculo/{vehiculo}/seguro/create', 'SeguroController@create')->name('seguro.create');
Route::put('vehiculo/{vehiculo}/seguro/{seguro}', 'SeguroController@update')->name('seguro.update');
Route::get('vehiculo/{vehiculo}/seguro/{seguro}', 'SeguroController@show')->name('seguro.show');
Route::delete('vehiculo/{vehiculo}/seguro/{seguro}', 'SeguroController@destroy')->name('seguro.destroy');
Route::get('vehiculo/{vehiculo}/seguro/{seguro}/edit', 'SeguroController@edit')->name('seguro.edit');

#Configuracipones
Route::get('vehiculo/{vehiculo}/configuracion', 'ConfiguracionController@index')->name('configuracion.index');
Route::post('vehiculo/{vehiculo}/configuracion/mantencion', 'ConfiguracionController@storeMantencionProgramada')->name('configuracion.mantencion.store');
Route::put('vehiculo/{vehiculo}/configuracion/mantencion/{mantencion}', 'ConfiguracionController@updateMantencionProgramada')->name('configuracion.mantencion.update');
Route::get('vehiculo/{vehiculo}/configuracion/mantencion', 'ConfiguracionController@createMantencionProgramada')->name('configuracion.mantencion.create');
Route::delete('vehiculo/{vehiculo}/configuracion/mantencion/{mantencion}', 'ConfiguracionController@destroyMantencionProgramada')->name('configuracion.mantencion.destroy');
Route::get('vehiculo/{vehiculo}/configuracion/mantencion/{mantencion}','ConfiguracionController@editMantencionProgramada')->name('configuracion.mantencion.edit');


//Route::resource('combustible','CombustibleController');
//Route::resource('configuracion','ConfiguracionController');
