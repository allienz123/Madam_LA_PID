<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'LoginController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::pattern('id', '[0-9]+');
Route::get('news/{id}', 'ArticlesController@show');
Route::get('video/{id}', 'VideoController@show');
Route::get('photo/{id}', 'PhotoController@show');
Route::get('customers/{id}', 'CustomerController@show');
Route::get('dc_customer/{id}', 'DcCustomerController@show');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    # Admin Dashboard
    Route::get('dashboard', 'DashboardController@index');

    # Language
    Route::get('language', 'LanguageController@index');
    Route::get('language/create', 'LanguageController@getCreate');
    Route::post('language/create', 'LanguageController@postCreate');
    Route::get('language/{id}/edit', 'LanguageController@getEdit');
    Route::post('language/{id}/edit', 'LanguageController@postEdit');
    Route::get('language/{id}/delete', 'LanguageController@getDelete');
    Route::post('language/{id}/delete', 'LanguageController@postDelete');
    Route::get('language/data', 'LanguageController@data');
    Route::get('language/reorder', 'LanguageController@getReorder');

    # News category
    Route::get('newscategory', 'ArticleCategoriesController@index');
    Route::get('newscategory/create', 'ArticleCategoriesController@getCreate');
    Route::post('newscategory/create', 'ArticleCategoriesController@postCreate');
    Route::get('newscategory/{id}/edit', 'ArticleCategoriesController@getEdit');
    Route::post('newscategory/{id}/edit', 'ArticleCategoriesController@postEdit');
    Route::get('newscategory/{id}/delete', 'ArticleCategoriesController@getDelete');
    Route::post('newscategory/{id}/delete', 'ArticleCategoriesController@postDelete');
    Route::get('newscategory/data', 'ArticleCategoriesController@data');
    Route::get('newscategory/reorder', 'ArticleCategoriesController@getReorder');

    # News
    Route::get('news', 'ArticlesController@index');
    Route::get('news/create', 'ArticlesController@getCreate');
    Route::post('news/create', 'ArticlesController@postCreate');
    Route::get('news/{id}/edit', 'ArticlesController@getEdit');
    Route::post('news/{id}/edit', 'ArticlesController@postEdit');
    Route::get('news/{id}/delete', 'ArticlesController@getDelete');
    Route::post('news/{id}/delete', 'ArticlesController@postDelete');
    Route::get('news/data', 'ArticlesController@data');
    Route::get('news/reorder', 'ArticlesController@getReorder');

    # Photo Album
    Route::get('photoalbum', 'PhotoAlbumController@index');
    Route::get('photoalbum/create', 'PhotoAlbumController@getCreate');
    Route::post('photoalbum/create', 'PhotoAlbumController@postCreate');
    Route::get('photoalbum/{id}/edit', 'PhotoAlbumController@getEdit');
    Route::post('photoalbum/{id}/edit', 'PhotoAlbumController@postEdit');
    Route::get('photoalbum/{id}/delete', 'PhotoAlbumController@getDelete');
    Route::post('photoalbum/{id}/delete', 'PhotoAlbumController@postDelete');
    Route::get('photoalbum/data', 'PhotoAlbumController@data');
    Route::get('photoalbum/reorder', 'PhotoAlbumController@getReorder');

    # Photo
    Route::get('photo', 'PhotoController@index');
    Route::get('photo/create', 'PhotoController@getCreate');
    Route::post('photo/create', 'PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'PhotoController@data');
    Route::get('photo/reorder', 'PhotoController@getReorder');

    # Video
    Route::get('videoalbum', 'VideoAlbumController@index');
    Route::get('videoalbum/create', 'VideoAlbumController@getCreate');
    Route::post('videoalbum/create', 'VideoAlbumController@postCreate');
    Route::get('videoalbum/{id}/edit', 'VideoAlbumController@getEdit');
    Route::post('videoalbum/{id}/edit', 'VideoAlbumController@postEdit');
    Route::get('videoalbum/{id}/delete', 'VideoAlbumController@getDelete');
    Route::post('videoalbum/{id}/delete', 'VideoAlbumController@postDelete');
    Route::get('videoalbum/data', 'VideoAlbumController@data');
    Route::get('video/reorder', 'VideoAlbumController@getReorder');

    # Video
    Route::get('video', 'VideoController@index');
    Route::get('video/create', 'VideoController@getCreate');
    Route::post('video/create', 'VideoController@postCreate');
    Route::get('video/{id}/edit', 'VideoController@getEdit');
    Route::post('video/{id}/edit', 'VideoController@postEdit');
    Route::get('video/{id}/delete', 'VideoController@getDelete');
    Route::post('video/{id}/delete', 'VideoController@postDelete');
    Route::get('video/{id}/itemsforalbum', 'VideoController@itemsForAlbum');
    Route::get('video/{id}/{id2}/albumcover', 'VideoController@getAlbumCover');
    Route::get('video/data/{id}', 'VideoController@data');
    Route::get('video/reorder', 'VideoController@getReorder');

    # Users
    Route::get('users/', 'UserController@index');
    Route::get('users/create', 'UserController@getCreate');
    Route::post('users/create', 'UserController@postCreate');
    Route::get('users/{id}/edit', 'UserController@getEdit');
    Route::post('users/{id}/edit', 'UserController@postEdit');
    Route::get('users/{id}/delete', 'UserController@getDelete');
    Route::post('users/{id}/delete', 'UserController@postDelete');
    Route::get('users/data', 'UserController@data');

    # Segmentasi Pelanggan
    Route::get('customerssegment/', 'CustomerSegmentController@index');
    Route::get('customerssegment/data', 'CustomerSegmentController@data');
    Route::get('customerssegment/reorder', 'CustomerSegmentController@getReorder');
    Route::get('customerssegment/create', 'CustomerSegmentController@getCreate');
    Route::post('customerssegment/create', 'CustomerSegmentController@postCreate');
    Route::get('customerssegment/{id}/delete', 'CustomerSegmentController@getDelete');
    Route::post('customerssegment/{id}/delete', 'CustomerSegmentController@postDelete');

     # List Pelanggan
    Route::get('customers/', 'CustomerController@index');
    Route::get('customers/data', 'CustomerController@data');
    Route::get('customers/reorder', 'CustomerController@getReorder');
    Route::get('customers/create', 'CustomerController@getCreate');
    Route::post('customers/create', 'CustomerController@postCreate');
    Route::get('customers/{id}/delete', 'CustomerController@getDelete');
    Route::post('customers/{id}/delete', 'CustomerController@postDelete');
    Route::get('customers/{id}/edit', 'CustomerController@getEdit');
    Route::post('customers/{id}/edit', 'CustomerController@postEdit');

     # List Location
    Route::get('location/', 'LocationController@index');
    Route::get('location/data', 'LocationController@data');
    Route::get('location/reorder', 'LocationController@getReorder');
    Route::get('location/create', 'LocationController@getCreate');
    Route::post('location/create', 'LocationController@postCreate');
    Route::get('location/{id}/delete', 'LocationController@getDelete');
    Route::post('location/{id}/delete', 'LocationController@postDelete');
    Route::get('location/{id}/edit', 'LocationController@getEdit');
    Route::post('location/{id}/edit', 'LocationController@postEdit');

     # Service Type
    Route::get('servicetype/', 'ServiceTypeController@index');
    Route::get('servicetype/data', 'ServiceTypeController@data');
    Route::get('servicetype/reorder', 'ServiceTypeController@getReorder');
    Route::get('servicetype/create', 'ServiceTypeController@getCreate');
    Route::post('servicetype/create', 'ServiceTypeController@postCreate');
    Route::get('servicetype/{id}/delete', 'ServiceTypeController@getDelete');
    Route::post('servicetype/{id}/delete', 'ServiceTypeController@postDelete');
    Route::get('servicetype/{id}/edit', 'ServiceTypeController@getEdit');
    Route::post('servicetype/{id}/edit', 'ServiceTypeController@postEdit');

    # Datacenter Customer
    Route::get('cid/', 'DcCustomerController@index');
    Route::get('cid/data/{id}', 'DcCustomerController@data');
    Route::get('cid/reorder', 'DcCustomerController@getReorder');
    Route::get('cid/create', 'DcCustomerController@getCreate');
    Route::post('cid/create', 'DcCustomerController@postCreate');
    Route::get('cid/{id}/delete', 'DcCustomerController@getDelete');
    Route::post('cid/{id}/delete', 'DcCustomerController@postDelete');
    Route::get('cid/{id}/edit', 'DcCustomerController@getEdit');
    Route::post('cid/{id}/edit', 'DcCustomerController@postEdit');
    Route::get('cid/{id}/addCid', 'DcCustomerController@addCid');
    Route::get('cid/{id}/see', 'DcCustomerController@see');




});
