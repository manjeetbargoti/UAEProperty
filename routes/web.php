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
    Route::match(['get', 'post'], '/admin/property/{id}/edit', 'PropertyController@editProperty');
    Route::match(['get', 'post'], '/admin/property/{id}/delete', 'PropertyController@deleteProperty');
    Route::match(['get', 'post'], '/admin/add-property/check_slug', 'PropertyController@checkSlug');

    // Delete Property Image
    Route::match(['get', 'post'], '/admin/property-image/{id}/delete', 'PropertyController@deletePropertyImage');

    // Amenities (Add, Edit, Delete, View)
    Route::match(['get', 'post'], '/admin/add-amenities', 'PropertyController@addAmenity');
    Route::get('/admin/amenities', 'PropertyController@allAmenity');
    Route::match(['get','post'], '/admin/amenable/{id}', 'PropertyController@enableAmenity');
    Route::match(['get','post'], '/admin/amdisable/{id}', 'PropertyController@disableAmenity');

    // Get City List
    Route::get('/admin/get-city-list', 'PropertyController@getCityList');
    Route::get('/admin/property/21/edit/get-city-list', 'PropertyController@getCityList');

    // Post Module Routes
    Route::match(['get', 'post'], '/admin/new-post', 'PostController@newPost');
    Route::get('/admin/posts', 'PostController@postsAll');
    Route::match(['get', 'post'], '/admin/post/publish/{id}', 'PostController@publishPost');
    Route::match(['get', 'post'], '/admin/post/draft/{id}', 'PostController@draftPost');
    Route::match(['get', 'post'], '/admin/post/{id}/edit', 'PostController@editPost');
    Route::match(['get', 'post'], '/admin/post/{id}/delete', 'PostController@deletePost');

    // Category Module Routes
    Route::match(['get', 'post'], '/admin/new-category', 'PostCategoryController@newCategory');
    Route::get('/admin/categories', 'PostCategoryController@categoryAll');
    Route::match(['get', 'post'], '/admin/category/{id}/enable', 'PostCategoryController@enableCategory');
    Route::match(['get', 'post'], '/admin/category/{id}/disable', 'PostCategoryController@disableCategory');
    Route::match(['get', 'post'], '/admin/category/{id}/edit', 'PostCategoryController@editCategory');
    Route::match(['get', 'post'], '/admin/category/{id}/delete', 'PostCategoryController@deleteCategory');

    // Testimonial Routes
    Route::match(['get', 'post'], '/admin/new-testimonial', 'TestimonialController@addTestimonial');
    Route::get('/admin/testimonials', 'TestimonialController@testimonialAll');
    Route::match(['get', 'post'], '/admin/testimonial/{id}/edit', 'TestimonialController@editTestimonials');
    Route::match(['get', 'post'], '/admin/testimonial/{id}/delete', 'TestimonialController@deleteTestimonials');
    Route::match(['get', 'post'], '/admin/testimonial/{id}/enable', 'TestimonialController@enableTestimonials');
    Route::match(['get', 'post'], '/admin/testimonial/{id}/disable', 'TestimonialController@disableTestimonials');

    // Subscribers Route
    Route::get('/admin/subscribers', 'HomeController@subscriberList');

    // Homepage Banner Routes
    Route::match(['get','post'], '/admin/new-banners', 'BannerController@addBanner');
    Route::get('/admin/banners', 'BannerController@banners');
    Route::match(['get','post'], '/admin/banner/{id}/edit', 'BannerController@editBanner');
    Route::match(['get','post'], '/admin/banner/{id}/delete', 'BannerController@deleteBanner');
    Route::match(['get','post'], '/admin/banner/{id}/enable', 'BannerController@enableBanner');
    Route::match(['get','post'], '/admin/banner/{id}/disable', 'BannerController@disableBanner');

});

    // View Single Property
    Route::match(['get', 'post'], '/properties/{url}', 'HomeController@singleProperty');

    // Property Category Page
    Route::get('/category/{url}', 'HomeController@propertyCategory')->name('property.category');

    // Property for Route (Buy/Rent/OFF Plan)
    Route::get('/property-for/{id}/{url}', 'HomeController@propertyFor');

    // Property Based on City
    Route::get('/property/{id}/{city}', 'HomeController@cityProperty');

    // Blog Page
    Route::get('/blog', 'PostController@blogPage');

    // Single Post Details Page Route
    Route::get('/blog/{url}', 'PostController@singlePost');

    // List Your Property Route
    Route::match(['get','post'], '/list-your-property', 'PropertyController@listYourProperty');
    Route::match(['get','post'], '/list-your-property-2', 'PropertyController@listYourProperty2');

    // City List according State on List Your Property Page
    Route::get('/list-your-property/get-city-list', 'PropertyController@getCityList');

    // Subscribers Route
    Route::match(['get', 'post'], '/subscribe-now', 'HomeController@subscribe');

    // Homepage search start
    Route::get('/search', 'HomeController@search')->name('autocomplete.search');
    Route::post('/search-result', 'HomeController@searchresult');
    

Route::get('/logout', 'AdminController@logout');