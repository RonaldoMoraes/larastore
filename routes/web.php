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

Auth::routes();

###--------------------------------------------------------------------------------------------
### Products routes ###------------------------------------------------------------------------
###--------------------------------------------------------------------------------------------
#index
Route::get('/products', 'ProductController@index')				->	name('products');
#create
Route::get('/products/create', 'ProductController@create')		->	name('new_product');
#store
Route::post('/products', 'ProductController@store');
#show
Route::get('/products/{product}', 'ProductController@show')		->	name('product');
#edit
Route::get('/products/{product}/edit', 'ProductController@edit')->name('edit_product');
#update
Route::put('/products/{product}', 'ProductController@update')	->name('update_product');;
#destroy
Route::delete('/products/{product}', 'ProductController@destroy')->name('delete_product');
##---------------------------------------------------------------------------------------------
