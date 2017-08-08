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
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users_list')->name('users_list');

Auth::routes();

### Products routes ###------------------------------------------------------------------------
###--------------------------------------------------------------------------------------------
# Index
Route::get('/products', 'ProductController@index')				->	name('products');
# Create
Route::get('/products/create', 'ProductController@create')		->	name('new_product');
# Store
Route::post('/products', 'ProductController@store');
# Show
Route::get('/products/{product}', 'ProductController@show')		->	name('product');
# Edit
Route::get('/products/{product}/edit', 'ProductController@edit')->	name('edit_product');
# Update
Route::put('/products/{product}', 'ProductController@update')	->	name('update_product');;
# Destroy
Route::delete('/products/{product}', 'ProductController@destroy')->	name('delete_product');
##---------------------------------------------------------------------------------------------

### Trade routes ###---------------------------------------------------------------------------
###--------------------------------------------------------------------------------------------
# Index
Route::get('/trades', 'TradeController@index')				->	name('trades');
# Create
Route::get('/trades/create', 'TradeController@create')		->	name('new_trade');
# Store
Route::post('/trades', 'TradeController@store');
# Show
Route::get('/trades/{trade}', 'TradeController@show')		->	name('trade');
# Edit
Route::get('/trades/{trade}/edit', 'TradeController@edit')	->	name('edit_trade');
# Update
Route::put('/trades/{trade}', 'TradeController@update')		->	name('update_trade');;
# Destroy
Route::delete('/trades/{trade}', 'TradeController@destroy')	->	name('delete_trade');
##---------------------------------------------------------------------------------------------
