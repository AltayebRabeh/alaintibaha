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


Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\LoginController@login')->name('admin.login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
//Admin Home page after login
Route::group(['middleware'=>'admin'], function() {

    Route::get('/', 'DashboardController@index')->name('dashboard');
});

