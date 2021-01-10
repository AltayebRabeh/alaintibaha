<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticatedAdmin;

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

Route::group(['middleware'=> RedirectIfAuthenticatedAdmin::class], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login.post');
});
//Admin Home page after login
Route::group(['middleware'=>'admin'], function() {

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/news', 'NewsController@index')->name('admin.news');
    Route::get('/news/create', 'NewsController@create')->name('admin.news.create');
    Route::post('/news/store', 'NewsController@store')->name('admin.news.store');
    Route::get('/news/show/{id}', 'NewsController@show')->name('admin.news.show');
    Route::get('/news/edit/{id}', 'NewsController@edit')->name('admin.news.edit');
    Route::post('/news/update/{id}', 'NewsController@update')->name('admin.news.update');
    Route::post('/news/delete/{id}', 'NewsController@destroy')->name('admin.news.delete');


    Route::get('/breaking_news', 'BreakingNewsController@index')->name('admin.breaking_news');
    Route::post('/breaking_news/store', 'BreakingNewsController@store')->name('admin.breaking_news.store');
    Route::post('/breaking_news/delete/{id}', 'BreakingNewsController@destroy')->name('admin.breaking_news.delete');



    Route::get('/admins', 'AdminsController@index')->name('admin.admins');
    Route::get('/admins/create', 'AdminsController@create')->name('admin.admins.create');
    Route::post('/admins/store', 'AdminsController@store')->name('admin.admins.store');
    Route::get('/admins/show/{id}', 'AdminsController@show')->name('admin.admins.show');
    Route::get('/admins/edit/{id}', 'AdminsController@edit')->name('admin.admins.edit');
    Route::post('/admins/update/{id}', 'AdminsController@update')->name('admin.admins.update');
    Route::post('/admins/delete/{id}', 'AdminsController@destroy')->name('admin.admins.delete');

    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

});


define('PAGINATE_COUNT', 10);
define('MAX_COUNT_FILE_UPLOAD', 5);

