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

Auth::routes();

Route::get('/','ProductController@allProducts');
Route::get('/products/{catergory}','ProductController@productsOfCategory');
Route::get('/products/{catergory}/{id}','ProductController@detailsOfProduct');

Route::get('/checkout','ShoppingCart@checkout');
Route::post('/placeOrder','PlaceOrder@placeOrder');

Route::get('/shoppingList','ShoppingCart@show');
Route::get('/addToCart/{id}','ShoppingCart@add');
Route::get('/deleteFromCart/{id}','ShoppingCart@delete');

Route::group(['middleware' => ['admin']], function () {
	Route::get('/addInstrument','AddController@show');
	Route::post('/addInstrument','AddController@store');
	Route::get('/delete/{id}', 'DeleteController@delete');
	Route::get('/products/{category}/{id}/edit','EditController@show');
	Route::post('/products/{category}/{id}/edit','EditController@edit');

});

Route::get('/index', 'HomeController@index')->name('index');
Route::post('/index', 'HomeController@checklogin');
Route::post('/logout', 'HomeController@logout');
