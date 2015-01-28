<?php

Route::pattern('id', '\d+');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('ubicacion', ['as' => 'location', 'uses' => 'LocationController@index']);

Route::get('comodidades', ['as' => 'facilities', 'uses' => 'FacilitiesController@tours']);
Route::get('comodidades/restaurante', ['as' => 'restaurant', 'uses' => 'FacilitiesController@restaurant']);
Route::get('comodidades/motel', ['as' => 'motel', 'uses' => 'FacilitiesController@motel']);
Route::get('comodidades/rvparking', ['as' => 'rvparking', 'uses' => 'FacilitiesController@rvparking']);
Route::get('comodidades/casaelviejocactus', ['as' => 'casaelviejocactus', 'uses' => 'FacilitiesController@casaelviejocactus']);
Route::get('comodidades/deli', ['as' => 'deli', 'uses' => 'FacilitiesController@deli']);

Route::get('tours', ['as' => 'tours', 'uses' => 'ToursController@index']);

Route::get('noticias', ['as' => 'news', 'uses' => 'NewsController@index']);

Route::get('galeria', ['as' => 'gallery', 'uses' => 'GalleryController@index']);

Route::get('contacto', ['as' => 'contact', 'uses' => 'ContactController@index']);
Route::post('contacto/enviar', ['as' => 'contactMessage', 'uses' => 'ContactController@sendMessage']);



/* --------------------------
 * Admin Panel
 ---------------------------- */

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
Route::get('admin/noticias', ['as' => 'admin.news', 'uses' => 'AdminNewsController@getList', 'before' => 'auth']);
Route::get('admin/noticias/agregar', ['as' => 'addNews', 'uses' => 'AdminNewsController@add', 'before' => 'auth']);
Route::get('admin/noticias/editar/{id}', ['as' => 'editNews', 'uses' => 'AdminNewsController@edit', 'before' => 'auth']);
Route::get('admin/noticias/borrar/{id}', ['as' => 'deleteNews', 'uses' => 'AdminNewsController@delete', 'before' => 'auth']);
Route::post('admin/noticias/crear', ['as' => 'createPost', 'uses' => 'AdminNewsController@create', 'before' => 'auth']);
Route::post('admin/noticias/editar/{id}', ['as' => 'updatePost', 'uses' => 'AdminNewsController@update', 'before' => 'auth']);
