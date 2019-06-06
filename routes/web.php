<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', 'HomeController@index');

// Admin Login Route
Route::match(['get', 'post'], '/admin', 'AdminController@adminLogin')->name('login');
Route::get('/admin/dashboard', 'AdminController@dashboard');

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/admin/dashboard', 'AdminController@dashboard');

    // Property Type Routes
    Route::match(['get', 'post'], '/admin/add-property-type', 'PropertyController@addPropertyType');
    Route::get('/admin/property-type', 'PropertyController@propertyTypes');
    Route::match(['get','post'], '/admin/ptenable/{id}', 'PropertyController@enablePropertyType');
    Route::match(['get','post'], '/admin/ptdisable/{id}', 'PropertyController@disablePropertyType');

    // Property Routes [Add, View, Delete, Update]
    Route::match(['get', 'post'], '/admin/add-property', 'PropertyController@addProperty');
    Route::get('/admin/properties', 'PropertyController@allProperty');
    Route::match(['get', 'post'], '/admin/add-property/check_slug', 'PropertyController@checkSlug');

    // Amenities (Add, Edit, Delete, View)
    Route::match(['get', 'post'], '/admin/add-amenities', 'PropertyController@addAmenity');
    Route::get('/admin/amenities', 'PropertyController@allAmenity');
    Route::match(['get','post'], '/admin/amenable/{id}', 'PropertyController@enableAmenity');
    Route::match(['get','post'], '/admin/amdisable/{id}', 'PropertyController@disableAmenity');

    // Get City List
    Route::get('/admin/get-city-list', 'PropertyController@getCityList');

});

Route::get('/logout', 'AdminController@logout');
