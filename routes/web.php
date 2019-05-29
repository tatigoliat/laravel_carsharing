<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::resource('users', 'UserController');
Route::get('/users/edit/{id}','UserController@edit');
Route::post('/users/edit/{id}','UserController@update');

//Route::get('/usuarios', 'UserController@index'); 
//Route::get('/users/{id}', 'UserController@show')->where('id', '[0-9]+');

// Route::get('/usuarios/nuevo', 'UserController@create');

Route::get('/saludo/name{name}/nick/{nickname}', 'WelcomeUserController');



Route::get('/home', 'HomeController@index')->name('home');
