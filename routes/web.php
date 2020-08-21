<?php

use Illuminate\Support\Facades\Route;

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
//Frontend
Route::get('/','HomeController@index' );
Route::get('/trang-chu', 'HomeController@index');
Route::get('/san-pham', 'HomeController@index');
//Route::get('/detail-product','HomeController@showdetail');
//Route::get('/trang-chu', 'HomeController@phantrang');
//Route::get('/{brand}' , 'GucciController@index');



//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin_dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');


//CategoryProduct
Route::match(['get','post'],'/add-category-product', 'CategoryProduct@add_category_product');

Route::get('/all-category-product', 'CategoryProduct@all_category_product');
//Route::post('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/edit-cate/{category_id}', 'CategoryProduct@edit_cate');
Route::post('/update-category-product/{category_id}', 'CategoryProduct@update_cate');


//BrandProduct
Route::match(['get','post'],'/add-brand-product','BrandProduct@add_brand_product');

Route::get('/all-brand-product', 'BrandProduct@all_brand_product');
Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::get('/edit-brand/{brand_id}', 'BrandProduct@edit_brand');
Route::post('/update-brand-product/{brand_id}', 'BrandProduct@update_brand');
Route::get('/delete-cate/{category_id}', 'CategoryProduct@delete_cate');
Route::get('/delete-brand/{brand_id}', 'BrandProduct@delete_brand');
//Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
//Route::any('/add-brand-product','BrandProduct@add_brand_product');//{
	//return view('admin.add_brand_product');
//});

//Product
Route::match(['get','post'],'/add-product', 'ProductController@add_product');

Route::get('/all-product', 'ProductController@all_product');

Route::get('/edit-product/{product_id}', 'ProductController@edit_product');

Route::post('/update-product/{product_id}', 'ProductController@update_product');


Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::get('/all-payment', 'CheckOutController@all_payment');

Route::get('/brand/{id}','ProductController@brand_show');

Route::get('/cate/{id}','ProductController@cate_show');
Route::get('/detail-product/{id}', 'ProductController@detail');



//Pagination

//Detail products
//Route::get('/detail-product/{id}','ProductController@detail');

//quickview-detail
//Route::resource('/quickview','ViewController');
Route::get('/quickview/{id}/view','QuickViewController@show')->name('view');

//testajax

//Route::get('/testajax','QuickviewController@hien');
//Route::get('/testajax/{id}/viewtest','QuickviewController@show')->name('viewtest');

//
//products with category or brand
// Route::get('/type/{id}/brand','ProductController@brand_ajax')->name('brand');
// Route::get('/type/{id}/cate','ProductController@cate_ajax')->name('cate');

//search ajax 
Route::get('/search','SearchajaxController@showsearch');

//cart
Route::get('/add-cart-ajax/{id}/show_cart', 'CartAjaxController@add_cart_ajax')->name('show_cart');
Route::get('/gio-hang','CartAjaxController@gio_hang');
Route::get('/Add-Cart-Quanty/{id}/{quanty}','CartAjaxController@add_cart_quanty');

Route::get('/Add-Cart/{id}', 'CartAjaxController@add_cart');
//Route::get('/gio-hang','CartAjaxController@list_cart');
Route::get('/Delete-Item-Cart/{id}', 'CartAjaxController@DeleteItemCart');
Route::get('/List-Cart', 'CartAjaxController@ViewListCart');
Route::get('/Delete-Item-List-Cart/{id}', 'CartAjaxController@DeleteListItemCart');
Route::get('/Save-Item-List-Cart/{id}/{quanty}', 'CartAjaxController@SaveListItemCart');



//User
Route::get('/login','UserController@index');
Route::post('/home', 'UserController@index');
//Route::match(['get','post'],'/login','UserController@index');
Route::match(['get','post'],'/register','UserController@indexregister');
Route::get('/user-profile/{user_id}', 'UserController@user_profile');
Route::get('/home', 'UserController@show_home');
Route::get('/logout','UserController@logout');



//Payment
Route::get('/thanh-toan','CheckOutController@payment');
Route::post('/save-order','CheckOutController@save_order');
Route::get('/order-detail/{order_id}','CheckOutController@order_detail');