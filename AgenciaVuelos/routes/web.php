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

////         Vista General
Route::get('/', function () {
    return view('welcome');
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//          RUTAS SA
Route::get('register', 'Auth\RegisterSAController@showRegistrationForm')->name('register')->middleware('auth');
Route::post('register', 'Auth\RegisterSAController@register')->middleware('auth');



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//          RUTAS CLIENTE

Route::get('/home', 'HomeController@index')->name('home');

//LOGIN y REGISTER
Auth::routes();


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//          RUTAS ADMIN
//mostrar clientes
Route::get('clientes', 'UserViewController@index')->name('usersViews');

Route::resource('tarifas', 'TarifaController');
Route::post('tarifas/{tarifa}', 'TarifaController@update1');

Route::resource('clases', 'ClaseController');
Route::post('clases/{clase}', 'ClaseController@update1');

Route::resource('clasetarifa','ClaseTarifaController');
Route::get('clasetarifa/create','ClaseTarifaController@getClasetarifas');
Route::post('clasetarifa/{clasetarifa}','ClaseTarifaController@update1');

Route::resource('modelos','ModeloController');
Route::post('modelos/{modelo}','ModeloController@update1');

Route::resource('aviones','AvionController')->middleware('auth');
Route::get('aviones/create','AvionController@getAviones');
Route::post('aviones/{avion}','AvionController@update1');

Route::resource('clasemodelos','ClaseModeloController');
Route::post('clasemodelos/relaciones','ClaseModeloController@relaciones');
Route::post('clasemodelos/{clasemodelo}','ClaseModeloController@update1');

Route::resource('ciudades','CiudadController')->middleware('auth');
Route::post('ciudades/{ciudad}','CiudadController@update1');

Route::resource('rutas','RutaController');
Route::get('rutas/create','RutaController@getRutas');
Route::post('rutas/{ruta}','RutaController@update1');

Route::resource('preciorutas','PreciorutaController');
Route::post('preciorutas/precios','PreciorutaController@precios');
Route::post('preciorutas/{precioruta}','PreciorutaController@update1');

Route::resource('viajes','ViajeController');
Route::get('viajes/create','ViajeController@getViajes');
Route::post('viajes/aviones','ViajeController@getAviones');
Route::post('viajes/{viaje}','ViajeController@update1');

Route::resource('viajeprecios','ViajeprecioController');
Route::post('viajeprecios/tarifas','ViajeprecioController@getTarifas');
Route::post('viajeprecios/{viajeprecios}','ViajeprecioController@update1');

Route::post('viajedisponibilidad/cargar','ViajedisponibilidadController@getDisponibilidad');
Route::post('viajedisponibilidad/registrar','ViajedisponibilidadController@setDisponibilidad');
Route::post('viajedisponibilidad/actualizar','ViajedisponibilidadController@updateDisponibilidad');


