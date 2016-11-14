<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

 return view('/AdminLTE/login');
});


Route::get('/index', function () {
    return view('/AdminLTE/index');
});

Route::get('/personas', function () {
    return view('/AdminLTE/personas');
});



Route::get('prueba', function () {
    return view('welcome');
});

Route::resource('/login','InicioController');
Route::resource('/Inicio','InicioController@form');
Route::resource('/getPersonas','InicioController@getpersonas');
Route::resource('/Inicio/getpersonas', 'InicioController@getpersonas');
Route::get('foo', function () {
    return 'Hello World';
});

Route::post('personas', 'InicioController@getpersonas')->name('personas');