<?php

Route::pattern('id', '\d+');

// Admin panel login
Route::get('admin', ['as' => 'admin', 'uses' => 'AuthController@showLogin']);
Route::post('admin/login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('admin/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

// User administration
Route::get('admin/usuarios', ['as' => 'users', 'uses' => 'UserController@getList', 'before' => 'auth']);
Route::get('admin/usuarios/nuevo', ['as' => 'newUser', 'uses' => 'UserController@add', 'before' => 'auth']);
Route::get('admin/usuarios/editar/{id}', ['as' => 'editUser', 'uses' => 'UserController@edit', 'before' => 'auth']);
Route::get('admin/usuarios/borrar/{id}', ['as' => 'deleteUser', 'uses' => 'UserController@delete', 'before' => 'auth']);
Route::post('admin/usuarios/crear', ['as' => 'createUser', 'uses' => 'UserController@create', 'before' => 'auth']);
Route::post('admin/usuarios/editar/{id}', ['as' => 'updateUser', 'uses' => 'UserController@update', 'before' => 'auth']);

// news administration
Route::get('admin/noticias', ['as' => 'admin.news', 'uses' => 'NewsController@getList', 'before' => 'auth']);
Route::get('admin/noticias/agregar', ['as' => 'addNews', 'uses' => 'NewsController@add', 'before' => 'auth']);

Route::get('admin/noticias/editar/{id}', ['as' => 'editNews', 'uses' => 'NewsController@edit', 'before' => 'auth']);
Route::get('admin/noticias/borrar/{id}', ['as' => 'deleteNews', 'uses' => 'NewsController@delete', 'before' => 'auth']);
Route::post('admin/noticias/crear', ['as' => 'createPost', 'uses' => 'NewsController@create', 'before' => 'auth']);
Route::post('admin/noticias/editar/{id}', ['as' => 'updatePost', 'uses' => 'NewsController@update', 'before' => 'auth']);
