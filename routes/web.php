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

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate')->name('login.confirm');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){
	Route::get('dashboard', function () {
	    return view('welcome');
	})->name('dashboard');
	
	Route::get('groups', 'UserGroupsController@index');
	Route::get('groups/create', 'UserGroupsController@create');
	Route::post('groups', 'UserGroupsController@store');
	Route::delete('groups/{id}', 'UserGroupsController@destroy');

	

	Route::resource('users', 'UsersController');
	Route::get('users/{id}/sales', 'UserSalesController@index')->name('user.sales');
	Route::get('users/{id}/purchases', 'UserPurchasesController@index')->name('user.purchases');
	
	Route::get('users/{id}/payments', 'UserPaymentsController@index')->name('user.payments');
	Route::post('users/{id}/payments', 'UserPaymentsController@store')->name('user.payments.store');
	Route::delete('users/{id}/payments/{payment_id}', 'UserPaymentsController@destroy')->name('user.payments.destroy');
	
	Route::get('users/{id}/receipts', 'UserReceiptsController@index')->name('user.receipts');

	

	Route::resource('categories', 'CategoriesController', ['except' => ['show']]);

	Route::resource('products', 'ProductsController');
});