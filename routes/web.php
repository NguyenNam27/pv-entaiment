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

// check admin
Route::get('/admin','CheckController@index')->name('admin.index');
Route::post('/admin/checkout','CheckController@checkout')->name('admin.checkout');
//dang ky
Route::get('/admin-register','CheckController@AdminRegister')->name('admin.register');
Route::post('/register/add-register/','CheckController@PostRegister')->name('register.post');
//check user

//login
Route::get('/login','FrontEndController@login')->name('login.index');
Route::post('/login/checkout','FrontEndController@postlogin')->name('login.checkout');
//sigup
Route::get('/sigup','FrontEndController@register')->name('sigup');
Route::post('/signup/add-signup/','FrontEndController@postSignup')->name('signup.post');

//Route::group(['middleware'=>'LoginUser'],function (){
//
//});


Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'check'], function(){

    Route::resource('/user','UserController');
    Route::resource('/banner','BannerController');
    Route::resource('/category','CategoryController');
    Route::resource('/subcategory','SubCategoryController');
    Route::resource('/post','PostController');
    Route::resource('/product','ProductController');
    Route::resource('/setting','SettingController');
    Route::resource('/video','VideoController');
    Route::resource('/booking','ContactController');
    Route::resource('/photo','GalleryController');



});


//Frontennd
Route::get('/','FrontEndController@Trangchu')->name('trangchu');
Route::get('KOL','FrontEndController@KOL')->name('KOL');
Route::get('news','FrontEndController@tintuc')->name('tintuc');
Route::get('chi-tiet-tin-tuc/{slug}','FrontEndController@chitiettintuc')->name('chitiettintuc');
Route::get('contact','FrontEndController@lienhe')->name('lienhe');
Route::post('lien-he','FrontEndController@post_lienhe')->name('post');
Route::get('product','FrontEndController@store')->name('product');
Route::get('chi-tiet-san-pham/{slug}','FrontEndController@chitietsanpham')->name('chitietsanpham');


Route::get('login','FrontEndController@login')->name('login');
Route::get('signup','FrontEndController@signup')->name('signup');

Route::get('picture','FrontEndController@picture')->name('picture');
Route::get('video','FrontEndController@video')->name('video');
Route::get('setting','FrontEndController@setting')->name('setting');
//cart
Route::get('cart','CartController@giohang_index')->name('cart.index');
Route::get('add-to-cart/{id}','CartController@AddToCart')->name('add_cart');
Route::patch('update-cart','CartController@UpdateCart')->name('update_cart');
Route::delete('remove-cart','CartController@RemoveCart')->name('remove-cart');

//ajax location
Route::post('district/','LocationController@loadDistrict')->name('location.district');
Route::post('ward/','LocationController@loadWard')->name('location.ward');

//đặt hàng
//Route::get('order','CartController@Order')->name('order');
Route::get('/checkout', 'CartController@getCheckOut');
Route::post('/checkout', 'CartController@postCheckOut');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
