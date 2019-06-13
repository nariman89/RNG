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
Auth::routes();
Route::view('/', 'welcome'); //First page
Route::middleware(['auth'])->group(function() {
Route::get('/article/adsArticle', 'ArticleController@create');
});
Route::get('/article/index', 'PageController@index');

Route::get('/category/{id}', 'PageController@adsByCategory');
Route::get('/article/{article}', 'ArticleController@edit');
Route::post('/article/{article}', 'ArticleController@update');
Route::delete('/article/{article}', 'ArticleController@destroy');

Route::resource('/categories', 'CategoryController');
Route::post('/article/adsArticle', 'ArticleController@store');
 Route::get('showDetail/{id}','ArticleController@adsDetails');
Route::middleware(['auth'])->group(function() {
Route::get('/projects/myarticles', function () {
	return view('/projects/myarticles');
});
});
Route::resource('/article/', 'ArticleController');
Route::get('/article/index', 'ArticleController@index');
Route::get('/article/app', 'CategoryController@index');
Route::resource('/bookings/bookfinish', 'BookingController');




