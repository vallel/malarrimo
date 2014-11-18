<?php

Route::pattern('id', '\d+');

// Admin panel login
Route::get('admin', ['as' => 'admin', 'uses' => 'AuthController@showLogin']);
Route::post('admin/login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('admin/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

// User administration
Route::get('admin/usuarios', ['as' => 'users', 'uses' => 'UserController@getList']);
Route::get('admin/usuarios/nuevo', ['as' => 'newUser', 'uses' => 'UserController@add']);
Route::get('admin/usuarios/editar/{id}', ['as' => 'editUser', 'uses' => 'UserController@edit']);
Route::get('admin/usuarios/borrar/{id}', ['as' => 'deleteUser', 'uses' => 'UserController@delete']);
Route::post('admin/usuarios/crear', ['as' => 'createUser', 'uses' => 'UserController@create']);
