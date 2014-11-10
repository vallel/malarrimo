<?php

// Admin panel login
Route::get('admin', ['as' => 'admin', 'uses' => 'AuthController@showLogin']);
Route::post('admin/login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('admin/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

// User administration
Route::get('admin/usuarios', ['as' => 'users', 'uses' => 'UserController@getList']);
Route::post('admin/usuarios/crear', ['as' => 'createUser', 'uses' => 'UserController@create']);