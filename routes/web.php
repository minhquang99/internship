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
//Route::get('/trang-chu', 'HomeController@phantrang');
//Route::get('/{brand}' , 'GucciController@index');



//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin_dashboard', 'AdminController@dashboard');


//CategoryProduct
Route::get('/add-category-product', 'CategoryProduct@add_category_product');

Route::get('/all-category-product', 'CategoryProduct@all_category_product');
Route::post('/save-category-product', 'CategoryProduct@save_category_product');

//BrandProduct
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');

Route::get('/all-brand-product', 'BrandProduct@all_brand_product');
Route::post('/save-brand-product', 'BrandProduct@save_brand_product');

//Product
Route::get('/add-product', 'ProductController@add_product');

Route::get('/all-product', 'Product@all_product');
Route::post('/save-product', 'ProductController@save_product');

//Pagination

