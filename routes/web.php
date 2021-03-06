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

Route::get('/test', function () {
	return view('email.bookingdetail');
});

Route::get('/', function () {
    return Auth::check() ? Auth::user()->role_id == '1' ? view('admin.index') : redirect()->route('products.index') : view('welcome'); 
});

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function(){

	Route::resource('admin', 'Admin\AdminController');
	Route::get('user-management/admin', 'Admin\AdminController@userManagement')->name('user-management.admin');
	Route::get('user-management/customer', 'Admin\AdminController@customer')->name('user-management.customer');
	Route::get('blacklists', 'Admin\AdminController@blacklists')->name('admin.blacklists');

	Route::resource('product', 'Admin\Product\ProductController');
	Route::get('openbooking/{id}', 'Admin\Product\ProductController@openbooking')->name('product.openbooking');
	Route::get('closebooking/{id}', 'Admin\Product\ProductController@closebooking')->name('product.closebooking');

	Route::resource('category', 'Admin\Product\CategoryController');

	Route::resource('promotion', 'Admin\Product\PromotionController');

	Route::resource('payment', 'Admin\PaymentController');
	Route::get('payment/approve/{id}/{idx}', 'Admin\PaymentController@approve')->name('payment.approve');

});

Route::group(['middleware' => ['auth']], function(){

	Route::resource('products', 'Customer\CustomerController');
	Route::get('products', 'Customer\CustomerController@index')->name('products.index');
	Route::get('customer/{id}/edit', 'Customer\CustomerController@edit')->name('customer.edit');
	Route::get('myorder', 'Customer\CustomerController@myorders')->name('customer.myorder');
	Route::get('profile', 'Customer\CustomerController@profile')->name('customer.profile');
	Route::get('coupons', 'Customer\CustomerController@coupon')->name('customer.coupon');

	Route::resource('booking', 'BookingController');
	Route::get('booking/create/{id}', 'BookingController@create')->name('booking.create');

	Route::get('payment/create/{id}', 'Customer\PaymentController@create')->name('customer.payment.create');
	Route::post('payment/store', 'Customer\PaymentController@store')->name('customer.payment.store');
	Route::get('mail', function(){
		return view('email.mail');
	});

});