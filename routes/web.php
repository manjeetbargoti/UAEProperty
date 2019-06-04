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
Route::match(['get', 'post'], '/admin', 'AdminController@adminLogin');

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/admin/dashboard', 'AdminController@dashboard');

    // Property Type Routes
    Route::match(['get', 'post'], '/admin/add-property-type', 'PropertyController@addPropertyType');
    Route::get('/admin/property-type', 'PropertyController@propertyTypes');
    Route::match(['get','post'], '/admin/ptenable/{id}', 'PropertyController@enablePropertyType');
    Route::match(['get','post'], '/admin/ptdisable/{id}', 'PropertyController@disablePropertyType');

});

Route::get('/logout', 'AdminController@logout');
