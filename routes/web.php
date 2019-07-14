<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::resource('users', 'UserController');
Route::get('/users/edit/{id}','UserController@edit');
Route::post('/users/edit/{id}','UserController@update');
Route::get('/users/ver/{id}','UserController@ver');

Route::resource('automoviles', 'AutomovilController');
Route::get('/automoviles/create','AutomovilController@create');
Route::get('/automoviles/miauto/{id}','AutomovilController@miauto')->name('/automoviles/miauto');
Route::get('/automoviles/edit/{id}','AutomovilController@edit');
Route::post('/automoviles/edit/{id}','AutomovilController@update');

Route::resource('solicitudes', 'SolicitarController');
Route::get('/solicitudes/missolicitudes/{id}','SolicitarController@missolicitudes')->name('/solicitudes/missolicitudes');
Route::get('/solicitudes/create/{id}','SolicitarController@create');
Route::get('/solicitudes/tomarviaje/{id}','SolicitarController@tomarviaje');
Route::get('/solicitudes/pedidos','SolicitarController@pedidos');
Route::get('/solicitudes/datospasajero/{id}','SolicitarController@datospasajero')->name('/solicitudes/datospasajero');
Route::get('/solicitudes/cancelarsolicitud/{id}','SolicitarController@cancelarsolicitud');
Route::get('/solicitudes/completarviaje/{id}','SolicitarController@completarviaje')->name('/solicitudes/completarviaje');
Route::get('/solicitudes/cancelarviaje/{id}','SolicitarController@cancelarviaje')->name('/solicitudes/cancelarviaje');



Route::get('/saludo/name{name}/nick/{nickname}', 'WelcomeUserController');



Route::get('/home', 'HomeController@index')->name('home');
