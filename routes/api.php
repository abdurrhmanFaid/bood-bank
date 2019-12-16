<?php

/**
 * Auth Routes
 */

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::get('/me', 'MeController')->name('me');
    Route::post('/register', 'RegisterController');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');
    Route::group(['prefix' => 'password'], function () {
        Route::post('create', 'PasswordResetController@create');
        Route::get('find/{token}', 'PasswordResetController@find');
        Route::post('reset', 'PasswordResetController@reset');
    });
});

/**
 * Governorates & Governorate Cities
 */

Route::group(['prefix' => 'governorates', 'namespace' => 'Governorates'], function () {
    Route::get('/', 'GovernorateController');
    Route::get('/{governorate}/cities', 'GovernorateCitiesController@index');
});

/** Cities */
Route::get('/cities', 'Cities\CityController');

/**
 * Blood types
 */
Route::get('/blood-types', 'BloodTypes\BloodTypeController');

/**
 * Site settings
 */
Route::get('/site-settings', 'SiteSettings\SiteSettingController');

/**
 * Contacts
 */
Route::post('/contacts', 'Contacts\ContactController');

/**
 * Categories & Category Posts
 */

Route::group(['prefix' => 'categories', 'namespace' => 'Categories'], function() {
    Route::get('/', 'CategoryController');
    Route::get('/{category}/posts', 'CategoryPostsController@index');
    Route::get('/{category}/posts/{post}', 'CategoryPostsController@show');
});

/**
 * Posts & Post favourites
 */
Route::group(['prefix' => 'posts', 'namespace' => 'Posts'], function() {
    Route::get('/', 'PostController');
    Route::post('/{post}/favourites', 'PostFavouritesController');
});


/**
 * User
 */
Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
    Route::get('/favourited-posts', 'UserFavouritedPostsController');
    Route::get('/profile', 'UserProfileController@show');
    Route::patch('/profile', 'UserProfileController@update');
    Route::get('/allowed-notifications', 'UserNotificationsSettingController@index');
    Route::patch('/allowed-notifications', 'UserNotificationsSettingController@update');
});


/**
 * Donation Requests
 */
Route::group(['prefix' => 'donation-requests', 'namespace' => 'DonationRequests'], function () {
    Route::get('/', 'DonationRequestController@index');
    Route::post('/', 'DonationRequestController@store');
    Route::get('/{donationRequest}', 'DonationRequestController@show');
});
