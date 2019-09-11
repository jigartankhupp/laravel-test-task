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
   return view('login');
});

Route::get('login','UserController@index')->name('login');
Route::get('/signup', function () {
   return view('signup');
});

Route::post('user/signup','UserController@userSignup');
Route::get('user/login','UserController@index');
Route::post('user/login','UserController@userLogin');

Route::get('dashboard','UserController@dashboard');
Route::get('logout','UserController@userLogout');

Route::get('product/list','ProductController@productList');
Route::get('category/list','CategoryController@categoryList');
Route::get('product/detail/{id}','ProductController@getProductInfo');

//============ IN THAT VERIFY IS ADMIN   ======= //

Route::group(['middleware' =>['VerifyIsAdmin']],function(){	

	Route::get('product/add','ProductController@addProduct');
	Route::post('product/store','ProductController@storeProduct');
	Route::get('product/edit/{id}','ProductController@getProduct');
	Route::post('product/update/{id}','ProductController@updateProduct');
	Route::get('product/delete/{id}','ProductController@deleteProduct');

	Route::get('category/add','CategoryController@addCategory');
	Route::post('category/store','CategoryController@storeCategory');
	Route::get('category/edit/{id}','CategoryController@getCategory');
	Route::post('category/update/{id}','CategoryController@updateCategory');
	Route::get('category/delete/{id}','CategoryController@deleteCategory');


});

//============ IN THAT VERIFY  IS USER   ======= //

Route::group(['middleware' =>['VerifyIsUser']],function(){	


});
