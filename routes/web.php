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

$controller_path = 'App\Http\Controllers';

// authentication
Route::get('/login', $controller_path . '\authentications\Login@index')->name('auth-login');
Route::post('/login/proses', $controller_path . '\authentications\Login@login')->name('auth-login.proses');
Route::get('/logout', $controller_path . '\authentications\Login@logout')->name('auth-login.logout');

// Main Page Route
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');

// cabang
Route::get('/cabang', $controller_path . '\cabang\CabangController@index')->name('cabang.index')->middleware('Role:SUPERADMIN');
Route::get('/cabang/create', $controller_path . '\cabang\CabangController@create')->name('cabang.create')->middleware('Role:SUPERADMIN');
Route::post('/cabang/store', $controller_path . '\cabang\CabangController@store')->name('cabang.store')->middleware('Role:SUPERADMIN');
Route::get('/cabang/edit/{id}', $controller_path . '\cabang\CabangController@edit')->name('cabang.edit')->middleware('Role:SUPERADMIN');
Route::post('/cabang/update/{id}', $controller_path . '\cabang\CabangController@update')->name('cabang.update')->middleware('Role:SUPERADMIN');
Route::get('/cabang/delete/{id}', $controller_path . '\cabang\CabangController@delete')->name('cabang.delete')->middleware('Role:SUPERADMIN');

// subsidi
Route::get('/subsidi', $controller_path . '\subsidi\SubsidiController@index')->name('subsidi.index')->middleware('Role:SUPERADMIN');
Route::get('/subsidi/create', $controller_path . '\subsidi\SubsidiController@create')->name('subsidi.create')->middleware('Role:SUPERADMIN');
Route::post('/subsidi/store', $controller_path . '\subsidi\SubsidiController@store')->name('subsidi.store')->middleware('Role:SUPERADMIN');
Route::get('/subsidi/edit/{id}', $controller_path . '\subsidi\SubsidiController@edit')->name('subsidi.edit')->middleware('Role:SUPERADMIN');
Route::post('/subsidi/update/{id}', $controller_path . '\subsidi\SubsidiController@update')->name('subsidi.update')->middleware('Role:SUPERADMIN');
Route::get('/subsidi/delete/{id}', $controller_path . '\subsidi\SubsidiController@delete')->name('subsidi.delete')->middleware('Role:SUPERADMIN');

// role
Route::get('/role', $controller_path . '\role\RoleController@index')->name('role.index')->middleware('Role:SUPERADMIN');
Route::get('/role/create', $controller_path . '\role\RoleController@create')->name('role.create')->middleware('Role:SUPERADMIN');
Route::post('/role/store', $controller_path . '\role\RoleController@store')->name('role.store')->middleware('Role:SUPERADMIN');
Route::get('/role/edit/{id}', $controller_path . '\role\RoleController@edit')->name('role.edit')->middleware('Role:SUPERADMIN');
Route::post('/role/update/{id}', $controller_path . '\role\RoleController@update')->name('role.update')->middleware('Role:SUPERADMIN');
Route::get('/role/delete/{id}', $controller_path . '\role\RoleController@delete')->name('role.delete')->middleware('Role:SUPERADMIN');

// role
Route::get('/user', $controller_path . '\user\UserController@index')->name('user.index')->middleware('Role:SUPERADMIN');
Route::get('/user/create', $controller_path . '\user\UserController@create')->name('user.create')->middleware('Role:SUPERADMIN');
Route::post('/user/store', $controller_path . '\user\UserController@store')->name('user.store')->middleware('Role:SUPERADMIN');
Route::get('/user/edit/{id}', $controller_path . '\user\UserController@edit')->name('user.edit')->middleware('Role:SUPERADMIN');
Route::post('/user/update/{id}', $controller_path . '\user\UserController@update')->name('user.update')->middleware('Role:SUPERADMIN');
Route::get('/user/delete/{id}', $controller_path . '\user\UserController@delete')->name('user.delete')->middleware('Role:SUPERADMIN');

// role
Route::get('/product', $controller_path . '\product\ProductController@index')->name('product.index')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES');
Route::get('/product/create', $controller_path . '\product\ProductController@create')->name('product.create')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES');
Route::post('/product/store', $controller_path . '\product\ProductController@store')->name('product.store')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES');
Route::get('/product/edit/{id}', $controller_path . '\product\ProductController@edit')->name('product.edit')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES');
Route::post('/product/update/{id}', $controller_path . '\product\ProductController@update')->name('product.update')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES');
Route::get('/product/delete/{id}', $controller_path . '\product\ProductController@delete')->name('product.delete')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES');

// booking
Route::get('/booking', $controller_path . '\booking\BookingController@index')->name('booking.index')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::get('/booking/create', $controller_path . '\booking\BookingController@create')->name('booking.create')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::post('/booking/store', $controller_path . '\booking\BookingController@store')->name('booking.store')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::get('/booking/edit/{id}', $controller_path . '\booking\BookingController@edit')->name('booking.edit')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::post('/booking/update/{id}', $controller_path . '\booking\BookingController@update')->name('booking.update')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::get('/booking/delete/{id}', $controller_path . '\booking\BookingController@delete')->name('booking.delete')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::get('/booking/approve/{id}', $controller_path . '\booking\BookingController@approve')->name('booking.approve')->middleware('Role:SUPERADMIN');
Route::get('/booking/approve/payment/{id}', $controller_path . '\booking\BookingController@approvePayment')->name('booking.approve.payment')->middleware('Role:SUPERADMIN');
//detail
Route::get('/booking/detail/{id}', $controller_path . '\booking\BookingController@detail')->name('booking.detail')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::get('/booking/detail/print/{id}', $controller_path . '\booking\BookingController@detailPrint')->name('booking.detail.print')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/booking/document/{id}', $controller_path . '\booking\BookingController@document')->name('booking.document')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::post('/booking/document/store/{id}', $controller_path . '\booking\BookingController@documentStore')->name('booking.document.store')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/booking/document/print/{id}', $controller_path . '\booking\BookingController@documentPrint')->name('booking.document.print')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/booking/spk/print/{id}', $controller_path . '\booking\BookingController@spkPrint')->name('booking.spkPrint')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/booking/getPrice/{id}', $controller_path . '\booking\BookingController@getPriceProduct')->name('booking.getPrice')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
Route::get('/booking/getSubsidi/{id}', $controller_path . '\booking\BookingController@getSubsidi')->name('booking.getSubsidi')->middleware('Role:SUPERADMIN,SALES ADMIN,SALES,CUSTOMER');
// mediator
Route::get('/mediator', $controller_path . '\mediator\MediatorController@index')->name('mediator.index')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/mediator/create', $controller_path . '\mediator\MediatorController@create')->name('mediator.create')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::post('/mediator/store', $controller_path . '\mediator\MediatorController@store')->name('mediator.store')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/mediator/edit/{id}', $controller_path . '\mediator\MediatorController@edit')->name('mediator.edit')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::post('/mediator/update/{id}', $controller_path . '\mediator\MediatorController@update')->name('mediator.update')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/mediator/delete/{id}', $controller_path . '\mediator\MediatorController@delete')->name('mediator.delete')->middleware('Role:SUPERADMIN,SALES ADMIN');

// submission stnk & bpkb
Route::get('/submission/stnk', $controller_path . '\submission\SubmissionStnkController@index')->name('submission.stnk.index')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/submission/stnk/create', $controller_path . '\submission\SubmissionStnkController@create')->name('submission.stnk.create')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::post('/submission/stnk/store', $controller_path . '\submission\SubmissionStnkController@store')->name('submission.stnk.store')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/submission/stnk/edit/{id}', $controller_path . '\submission\SubmissionStnkController@edit')->name('submission.stnk.edit')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::post('/submission/stnk/update/{id}', $controller_path . '\submission\SubmissionStnkController@update')->name('submission.stnk.update')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/submission/stnk/delete/{id}', $controller_path . '\submission\SubmissionStnkController@delete')->name('submission.stnk.delete')->middleware('Role:SUPERADMIN,SALES ADMIN');

Route::get('/submission/bpkb', $controller_path . '\submission\SubmissionBpkbController@index')->name('submission.bpkb.index')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/submission/bpkb/create', $controller_path . '\submission\SubmissionBpkbController@create')->name('submission.bpkb.create')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::post('/submission/bpkb/store', $controller_path . '\submission\SubmissionBpkbController@store')->name('submission.bpkb.store')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/submission/bpkb/edit/{id}', $controller_path . '\submission\SubmissionBpkbController@edit')->name('submission.bpkb.edit')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::post('/submission/bpkb/update/{id}', $controller_path . '\submission\SubmissionBpkbController@update')->name('submission.bpkb.update')->middleware('Role:SUPERADMIN,SALES ADMIN');
Route::get('/submission/bpkb/delete/{id}', $controller_path . '\submission\SubmissionBpkbController@delete')->name('submission.bpkb.delete')->middleware('Role:SUPERADMIN,SALES ADMIN');

// booking
Route::get('/laporan', $controller_path . '\laporan\LaporanController@index')->name('laporan.index')->middleware('Role:SUPERADMIN');
Route::get('/news/export',$controller_path . '\laporan\LaporanController@exportExcel')->name('laporan.export')->middleware('Role:SUPERADMIN');
// parameter
Route::get('/parameter', $controller_path . '\parameter\ParameterController@index')->name('parameter.index')->middleware('Role:SUPERADMIN');
Route::get('/parameter/create', $controller_path . '\parameter\ParameterController@create')->name('parameter.create')->middleware('Role:SUPERADMIN');
Route::post('/parameter/store', $controller_path . '\parameter\ParameterController@store')->name('parameter.store')->middleware('Role:SUPERADMIN');
Route::get('/parameter/edit/{id}', $controller_path . '\parameter\ParameterController@edit')->name('parameter.edit')->middleware('Role:SUPERADMIN');
Route::post('/parameter/update/{id}', $controller_path . '\parameter\ParameterController@update')->name('parameter.update')->middleware('Role:SUPERADMIN');
Route::get('/parameter/delete/{id}', $controller_path . '\parameter\ParameterController@delete')->name('parameter.delete')->middleware('Role:SUPERADMIN');

// parameter detail
Route::get('/parameter-detail', $controller_path . '\parameter\ParameterDetailController@index')->name('parameter.detail.index')->middleware('Role:SUPERADMIN');
Route::get('/parameter-detail/create', $controller_path . '\parameter\ParameterDetailController@create')->name('parameter.detail.create')->middleware('Role:SUPERADMIN');
Route::post('/parameter-detail/store', $controller_path . '\parameter\ParameterDetailController@store')->name('parameter.detail.store')->middleware('Role:SUPERADMIN');
Route::get('/parameter-detail/edit/{id}', $controller_path . '\parameter\ParameterDetailController@edit')->name('parameter.detail.edit')->middleware('Role:SUPERADMIN');
Route::post('/parameter-detail/update/{id}', $controller_path . '\parameter\ParameterDetailController@update')->name('parameter.detail.update')->middleware('Role:SUPERADMIN');
Route::get('/parameter-detail/delete/{id}', $controller_path . '\parameter\ParameterDetailController@delete')->name('parameter.detail.delete')->middleware('Role:SUPERADMIN');