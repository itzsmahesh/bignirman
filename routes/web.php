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

Route::group([ 'middleware' => ['web_mid']], function ()
{
    Route::group([ 'middleware' => ['auth_front']], function () {
    });
});




/* -------------------------------- Master Admin Code Start --------------------------------- */

Route::group(array('prefix' => 'masterAdmin','namespace'=>'masterAdmin'), function(){
   Route::group([ 'middleware' => ['guest_admin']], function () {

       Route::any('/', ['as' => '/', 'uses' => 'UserController@login']);
        Route::any('/login', ['as' => 'login', 'uses' => 'UserController@login']);

   });
   Route::group([ 'middleware' => ['auth_admin', 'web_mid']], function () {
       Route::any('/dahboard',['as' => 'dahboard', 'uses' =>'masterAdminController@showDashboard']);
       Route::any('/dashboard',['as' => 'dashboard', 'uses' =>'DashboardController@showDashboard']);
        Route::any('logout', ['as' => 'logout', 'uses' =>'UserController@logout']);



     /* ------------------------------------ Slider Code Start ------------------------------ */

     Route::any('add_slider', ['as' => 'add_slider', 'uses' =>'SliderController@add_slide']);
     Route::get('slider_mange', ['as' => 'slider_mange', 'uses' =>'SliderController@slider_list']);
     Route::post('slider_save', ['as' => 'slider_save', 'uses' =>'SliderController@slider_saves']);
     Route::any('slider_status', ['as' => 'slider_status', 'uses' =>'SliderController@slider_status_changed']);
     Route::any('sliderDelete/{id}', ['as' => 'sliderDelete', 'uses' =>'SliderController@sliderDelete']);
     Route::any('sliderUpdate/{id}', ['as' => 'sliderUpdate', 'uses' =>'SliderController@slideredit']);
     Route::post('slider_update_save', ['as' => 'slider_update_save', 'uses' =>'SliderController@slider_edit_save']);

     Route::post('slider_status_update', ['as' => 'slider_status_update', 'uses' =>'SliderController@slider_status_update_save']);


     /* ------------------------------------ Slider Code End ------------------------------- */

     /* --------------------------- Testimonials Code Start --------------------------- */

     /* ------------------------------------ Seller Code Start ------------------------------- */

    Route::get('seller', ['as' => 'seller', 'uses' =>'SellerController@index']);
    Route::get('newSeller', ['as' => 'newSeller', 'uses' =>'SellerController@create']);
    Route::post('sellerSave', ['as' => 'sellerSave', 'uses' =>'SellerController@store']);
    Route::get('sellerEdit/{id}', ['as' => 'sellerEdit', 'uses' =>'SellerController@edit']);
    Route::post('sellerUpdate', ['as' => 'sellerUpdate', 'uses' =>'SellerController@update']);



     /* ---------------------------Seller End code --------------------------- */

     Route::get('testimonials', ['as' => 'testimonials', 'uses' =>'TestimonialsController@testimonialsList']);

     Route::get('addTestimonials', ['as' => 'addTestimonials', 'uses' =>'TestimonialsController@addTestimonialsPage']);

     Route::post('testimonialsSave', ['as' => 'testimonialsSave', 'uses' =>'TestimonialsController@testimonialsStore']);

     Route::any('testimonialsUpdate/{testimonials_id}', ['as' => 'testimonialsUpdate', 'uses' =>'TestimonialsController@testimonialsUpdatePage']);

     Route::post('testimonialsEditSave', ['as' => 'testimonialsEditSave', 'uses' =>'TestimonialsController@testimonialsEditStore']);

     Route::any('testimonialsDelete/{testimonials_id}', ['as' => 'testimonialsDelete', 'uses' =>'TestimonialsController@testimonialsDeleteFormat']);

     /* --------------------------- Testimonials Code End --------------------------- */



    /* ---------------------------- Setting Code Start ---------------------------- */

    Route::any('changePassword', ['as' => 'changePassword', 'uses' =>'Setting@changePasswordPage']);
    Route::any('adminPasswordUpdate/{id}', ['as' => 'adminPasswordUpdate', 'uses' =>'Setting@adminPasswordUpdatePage']);
    Route::any('changePasswordUpdate', ['as' => 'changePasswordUpdate', 'uses' =>'Setting@changePasswordUpdateSave']);

    /* ---------------------------- Setting Code End ---------------------------- */




    });
});


/* --------------------------------- Master Admin Code End --------------------------------- */
