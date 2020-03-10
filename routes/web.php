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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['admin'])->group(function () {
    Route::resource('/admin/products', 'admin\ProductsController')->middleware('admin');
    Route::resource('/admin/categories', 'admin\CategoriesController')->middleware('admin');
    Route::resource('/admin/users', 'admin\UserController')->middleware('admin');
    Route::resource('/admin/orders', 'admin\OrderController')->middleware('admin');
    Route::resource('/admin', 'admin\AdminController')->middleware('admin');

    Route::post('ProductsController@update');
    Route::post('CategoriesController@update');
    Route::post('UserController@update');
});

Route::get('/add-to-cart/{id}', 'User\ProductController@addToCart')->name('cart');

Route::get('/shopping-cart', [ 'uses' => 'User\ProductController@getCart', 'as' => 'product.shoppingCart' ]);

Route::get('/home/search/tag/{id}', 'User\ProductController@searchTag')->name('home.search.tag');

Route::get('/profile', 'Admin\UserController@getProfile')->name('profile');
Route::get('/checkout', 'User\ProductController@getCheckout')->name('checkin');

Route::get('user/checkout', 'User\ProductController@postCheckout')->name('checkout');

Route::get('/cart/reduce/{id}', 'User\ProductController@reduceByOne')->name('product.reduceByOne');
Route::get('/cart/remove/{id}', 'User\ProductController@removeItem')->name('product.removeItem');

Route::get('/home', 'User\ProductController@index')->name('home');
