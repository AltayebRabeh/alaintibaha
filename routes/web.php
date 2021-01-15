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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/read/{id}', 'HomeController@read')->name('read');
Route::get('/search', 'HomeController@search')->name('search');
Route::post('/comment/send/{id}', 'HomeController@sendComment')->name('send.comment');
Route::get('/vote', 'HomeController@vote')->name('send.polls');
Route::get('/pools', 'HomeController@polls')->name('pools');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile/update', 'HomeController@profile')->name('profile.update');
Route::get('/like/{id}/{new_id}/{user_id}', 'HomeController@like_dislike')->name('like');
