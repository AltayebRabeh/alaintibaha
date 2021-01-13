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
    
    Route::get('/news', 'NewsController@index')->name('admin.news')->middleware('cap');
    Route::get('/news/create', 'NewsController@create')->name('admin.news.create')->middleware('cap');
    Route::post('/news/store', 'NewsController@store')->name('admin.news.store');
    Route::get('/news/show/{id}', 'NewsController@show')->name('admin.news.show')->middleware('cap');
    Route::get('/news/edit/{id}', 'NewsController@edit')->name('admin.news.edit')->middleware('cap');
    Route::post('/news/update/{id}', 'NewsController@update')->name('admin.news.update');
    Route::post('/news/delete/{id}', 'NewsController@destroy')->name('admin.news.delete')->middleware('cap');


    Route::get('/breaking_news', 'BreakingNewsController@index')->name('admin.breaking_news')->middleware('cap');
    Route::post('/breaking_news/add/{id}', 'BreakingNewsController@add')->name('admin.breaking_news.add')->middleware('cap');
    Route::post('/breaking_news/delete/{id}', 'BreakingNewsController@destroy')->name('admin.breaking_news.delete')->middleware('cap');


    Route::get('/ads', 'AdsController@index')->name('admin.ads')->middleware('cap');
    Route::get('/ads/enable', 'AdsController@enable')->name('admin.ads.enable')->middleware('cap');
    Route::get('/ads/create', 'AdsController@create')->name('admin.ads.create')->middleware('cap');
    Route::post('/ads/store', 'AdsController@store')->name('admin.ads.store');
    Route::get('/ads/show/{id}', 'AdsController@show')->name('admin.ads.show')->middleware('cap');
    Route::get('/ads/edit/{id}', 'AdsController@edit')->name('admin.ads.edit')->middleware('cap');
    Route::post('/ads/update/{id}', 'AdsController@update')->name('admin.ads.update');
    Route::post('/ads/delete/{id}', 'AdsController@destroy')->name('admin.ads.delete')->middleware('cap');
    Route::post('/ads/show-hide/{id}', 'AdsController@showOrHide')->name('admin.ads.show_hide')->middleware('cap');


    Route::get('/comments', 'CommentsController@index')->name('admin.comments')->middleware('cap');
    Route::get('/comments/disiable', 'CommentsController@disiable')->name('admin.comments.disiable')->middleware('cap');
    Route::get('/comments/show/{id}', 'CommentsController@show')->name('admin.comments.show')->middleware('cap');
    Route::post('/comments/show-hide/{id}', 'CommentsController@showOrHide')->name('admin.comments.show_hide')->middleware('cap');
    Route::post('/comments/delete/{id}', 'CommentsController@destroy')->name('admin.comments.delete')->middleware('cap');


    Route::get('/profile', 'ProfileController@show')->name('admin.profile');
    Route::get('/profile/edit', 'ProfileController@edit')->name('admin.profile.edit');
    Route::post('/profile/update', 'ProfileController@update')->name('admin.profile.update');
    Route::post('/profile/password', 'ProfileController@password')->name('admin.profile.password');


    Route::get('/admins/all', 'AdminsController@index')->name('admin.admins')->middleware('cap');
    Route::get('/admins/disiable', 'AdminsController@disiable')->name('admin.admins.disiable')->middleware('cap');
    Route::get('/admins/create', 'AdminsController@create')->name('admin.admins.create')->middleware('cap');
    Route::get('/admins/show/{id}', 'AdminsController@show')->name('admin.admins.show')->middleware('cap');
    Route::post('/admins/store', 'AdminsController@store')->name('admin.admins.store');
    Route::get('/admins/edit/{id}', 'AdminsController@edit')->name('admin.admins.edit')->middleware('cap');
    Route::post('/admins/update/{id}', 'AdminsController@update')->name('admin.admins.update');
    Route::post('/admins/status/{id}', 'AdminsController@status')->name('admin.admins.status')->middleware('cap');


    Route::get('/users/all', 'UsersController@index')->name('admin.users')->middleware('cap');
    Route::get('/users/disiable', 'UsersController@disiable')->name('admin.users.disiable')->middleware('cap');
    Route::post('/users/status/{id}', 'UsersController@status')->name('admin.users.status')->middleware('cap');


    Route::get('/poll/all', 'PollController@index')->name('admin.poll')->middleware('cap');
    Route::get('/poll/enable', 'PollController@enable')->name('admin.poll.enable')->middleware('cap');
    Route::get('/poll/create', 'PollController@create')->name('admin.poll.create')->middleware('cap');
    Route::post('/poll/store', 'PollController@store')->name('admin.poll.store');
    Route::post('/poll/delete/{id}', 'PollController@destroy')->name('admin.poll.delete')->middleware('cap');
    Route::post('/poll/show-hide/{id}', 'PollController@showOrHide')->name('admin.poll.show_hide')->middleware('cap');


    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

});


define('PAGINATE_COUNT', 10);
define('MAX_COUNT_FILE_UPLOAD', 5);

