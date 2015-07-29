<?php

/*
 *  Set up locale and locale_prefix if other language is selected
 */
if (in_array(Request::segment(1), Config::get('app.alt_langs')))
{
 App::setLocale(Request::segment(1));
 Config::set('app.locale_prefix', Request::segment(1));
}

/*
 * Set up route patterns - patterns will have to be the same as in translated route for current language
 */
foreach(Lang::get('routes') as $k => $v)
{
 Route::pattern($k, $v);
}

Route::pattern('id', '\d+');


/* --------------------------
 * Website routes
 ---------------------------- */

Route::group(array('prefix' => Config::get('app.locale_prefix')), function()
{

 Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

 Route::get(Lang::get('routes.location'), ['as' => 'location', 'uses' => 'LocationController@index']);
 Route::get(Lang::get('routes.briefHistory'), ['as' => 'briefHistory', 'uses' => 'LocationController@briefHistory']);

 Route::get(Lang::get('routes.malarrimo'), ['as' => 'malarrimo', 'uses' => 'FacilitiesController@malarrimo']);
 Route::get(Lang::get('routes.ecoTours'), ['as' => 'ecoTours', 'uses' => 'FacilitiesController@tours']);
 Route::get(Lang::get('routes.restaurant'), ['as' => 'restaurant', 'uses' => 'FacilitiesController@restaurant']);
 Route::get(Lang::get('routes.motel'), ['as' => 'motel', 'uses' => 'FacilitiesController@motel']);
 Route::get(Lang::get('routes.rvparking'), ['as' => 'rvparking', 'uses' => 'FacilitiesController@rvparking']);
 Route::get(Lang::get('routes.casaelviejocactus'), ['as' => 'casaelviejocactus', 'uses' => 'FacilitiesController@casaelviejocactus']);
 Route::get(Lang::get('routes.deli'), ['as' => 'deli', 'uses' => 'FacilitiesController@deli']);

 Route::get(Lang::get('routes.tours'), ['as' => 'tours', 'uses' => 'ToursController@index']);
 Route::get(Lang::get('routes.equipment'), ['as' => 'equipment', 'uses' => 'ToursController@equipment']);
 Route::get(Lang::get('routes.fees'), ['as' => 'fees', 'uses' => 'ToursController@fees']);
 Route::get(Lang::get('routes.whales'), ['as' => 'whales', 'uses' => 'ToursController@whales']);
 Route::get(Lang::get('routes.otherTours'), ['as' => 'otherTours', 'uses' => 'ToursController@other']);
 Route::get(Lang::get('routes.otherFees'), ['as' => 'otherFees', 'uses' => 'ToursController@otherFees']);

 Route::get(Lang::get('routes.booking'), ['as' => 'booking', 'uses' => 'BookingController@index']);
 Route::post(Lang::get('routes.storeBooking'), ['as' => 'storeBooking', 'uses' => 'BookingController@store']);
 Route::get(Lang::get('routes.bookingConfirmation'), ['as' => 'bookingConfirmation', 'uses' => 'BookingController@confirmation']);

 Route::get(Lang::get('routes.news'), ['as' => 'news', 'uses' => 'NewsController@index']);
 Route::get(Lang::get('routes.post'), ['as' => 'post', 'uses' => 'NewsController@get']);

 Route::get(Lang::get('routes.galleries'), ['as' => 'galleries', 'uses' => 'GalleryController@index']);
 Route::get(Lang::get('routes.gallery'), ['as' => 'gallery', 'uses' => 'GalleryController@show']);

 Route::get(Lang::get('routes.contact'), ['as' => 'contact', 'uses' => 'ContactController@index']);
 Route::post(Lang::get('routes.contactMessage'), ['as' => 'contactMessage', 'uses' => 'ContactController@sendMessage']);

});



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
Route::get('admin/noticias/borrar-imagen/{id}', ['as' => 'deletePostImage', 'uses' => 'AdminNewsController@deletePostImage', 'before' => 'auth']);
Route::post('admin/noticias/crear', ['as' => 'createPost', 'uses' => 'AdminNewsController@create', 'before' => 'auth']);
Route::post('admin/noticias/editar/{id}', ['as' => 'updatePost', 'uses' => 'AdminNewsController@update', 'before' => 'auth']);

// galleries administration
Route::get('admin/galerias', ['as' => 'galleryList', 'uses' => 'AdminGalleriesController@getList', 'before' => 'auth']);
Route::get('admin/galeria', ['as' => 'addGallery', 'uses' => 'AdminGalleriesController@add', 'before' => 'auth']);
Route::get('admin/galeria/editar/{id}', ['as' => 'editGallery', 'uses' => 'AdminGalleriesController@edit', 'before' => 'auth']);
Route::get('admin/galeria/borrar/{id}', ['as' => 'deleteGallery', 'uses' => 'AdminGalleriesController@delete', 'before' => 'auth']);
Route::post('admin/galeria/crear', ['as' => 'createGallery', 'uses' => 'AdminGalleriesController@create', 'before' => 'auth']);
Route::post('admin/galeria/editar/{id}', ['as' => 'updateGallery', 'uses' => 'AdminGalleriesController@update', 'before' => 'auth']);
Route::post('admin/galeria/subir/{id}', ['as' => 'uploadGallery', 'uses' => 'AdminGalleriesController@uploadGallery', 'before' => 'auth']);
Route::get('admin/galeria/fotos/{id}', ['as' => 'galleryPics', 'uses' => 'AdminGalleriesController@getPictures', 'before' => 'auth']);
Route::delete('admin/galeria/foto/borrar/{id}', ['as' => 'deletePic', 'uses' => 'AdminGalleriesController@deletePicture', 'before' => 'auth']);

// booking administration
Route::get('admin/reservaciones', ['as' => 'adminBooking', 'uses' => 'AdminBookingController@getList', 'before' => 'auth']);
Route::get('admin/reservaciones/cambiar-estatus/{id}/{status}', ['as' => 'changeBookingStatus', 'uses' => 'AdminBookingController@changeStatus', 'before' => 'auth']);
Route::get('admin/reservaciones/detalles/{id}', ['as' => 'getBookingDetails', 'uses' => 'AdminBookingController@getDetails', 'before' => 'auth']);

// fees administration
Route::get('admin/tarifas', ['as' => 'admin.fees', 'uses' => 'AdminFeesController@getList', 'before' => 'auth']);
Route::post('admin/tarifas/guardar', ['as' => 'updateFees', 'uses' => 'AdminFeesController@update', 'before' => 'auth']);
