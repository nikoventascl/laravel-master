<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrador', function () {
    return view('administrador');
});
Route::get('/administrador', 'administradorController@index')->name('administrador');


Route::resource('tipoEventos', 'TipoEventosController');
Route::prefix('tipoEventos')->group(function() {
	Route::post('/cambiarEstado', [
        'as'   => 'tipoEventos.cambiarEstado',
        'uses' => 'TipoEventosController@cambiarEstado',
    ]);
});


Route::resource('tipoConsultas', 'TipoConsultasController');
Route::prefix('tipoConsultas')->group(function() {
	Route::post('/cambiarEstado', [
        'as'   => 'tipoConsultas.cambiarEstado',
        'uses' => 'TipoConsultasController@cambiarEstado',
    ]);
});

Route::resource('formularioscontactos', 'FormulariosContactosController');
Route::prefix('formularioscontactos')->group(function() {
	Route::post('/cambiarEstado', [
        'as'   => 'formularioscontactos.cambiarEstado',
        'uses' => 'FormulariosContactosController@cambiarEstado',
    ]);
});

Route::resource('viviendas', 'ViviendasController');
Route::prefix('viviendas')->group(function() {
    Route::post('/cambiarEstado', [
        'as'   => 'viviendas.cambiarEstado',
        'uses' => 'ViviendasController@cambiarEstado',
    ]);
});

Route::get('noticias/mostrar', 'NoticiasController@mostrar')->name('noticias.mostrar');
Route::resource('noticias', 'NoticiasController');
Route::prefix('noticias')->group(function() {
    Route::post('/cambiarEstado', [
        'as'   => 'noticias.cambiarEstado',
        'uses' => 'NoticiasController@cambiarEstado',
    ]);
});
Route::resource('eventos', 'EventosController');
Route::prefix('eventos')->group(function() {
    Route::post('/cambiarEstado', [
        'as'   => 'eventos.cambiarEstado',
        'uses' => 'EventosController@cambiarEstado',
    ]);
});

Route::resource('imagenes', 'ImagenesController');
Route::prefix('imagenes')->group(function() {
    Route::post('/subirImagen', [
        'as'   => 'imagenes.subirImagen',
        'uses' => 'ImagenesController@subirImagen',
    ]);
});

Route::resource('usuarios', 'UserController');
Route::prefix('usuarios')->group(function() {
    Route::post('/cambiarEstado', [
        'as'   => 'usuarios.cambiarEstado',
        'uses' => 'UserController@cambiarEstado',
    ]);
});

Route::resource('calendario', 'CalendarioController');

Route::get('/cuotas', 'HomeController@cuotas')->name('cuotas');

Route::get('/dialogo', 'HomeController@dialogos')->name('dialogo');