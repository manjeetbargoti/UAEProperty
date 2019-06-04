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
// Route::match(['get', 'post'], '/admin', 'AdminController@adminLogin');

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/admin/dashboard', 'AdminController@dashboard');

});

// Route::get('/admin', 'AdminController@adminLogin');

Route::get('/logout', 'AdminController@logout');
