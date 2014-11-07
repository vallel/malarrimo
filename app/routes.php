<?php

Route::get('admin', function() 
{
	return View::make('admin/login');
});

Route::post('admin/login', ['as' => 'login', 'uses' => 'AuthController@login']);