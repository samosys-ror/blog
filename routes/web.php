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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getUser','UserController@getUser')->name('getUser');
Route::get('/emailverify','UserController@emailverify')->name('emailverify');
Route::any('/success/{id}','UserController@success')->name('success');
Route::resource('knowledge','KnowledgeController');
Route::get('search','KnowledgeController@search')->name('search');
Route::resource('comment','CommentController');
Route::get('/contact','ApiController@Contact')->name('contact');