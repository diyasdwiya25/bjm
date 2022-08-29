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
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics')->middleware('Role:SUPERADMIN');

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
