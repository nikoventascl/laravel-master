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

Route::resource('viviendas', 'ViviendasController');
Route::prefix('viviendas')->group(function() {
    Route::post('/cambiarEstado', [
        'as'   => 'viviendas.cambiarEstado',
        'uses' => 'ViviendasController@cambiarEstado',
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