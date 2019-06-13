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



Route::resource('/categories', 'CategoryController');
 Route::get('showDetail/{id}','ArticleController@adsDetails');
Route::middleware(['auth'])->group(function() {
Route::get('/projects/myarticles', function () {
	return view('/projects/myarticles');
});
});
Route::resource('/article', 'ArticleController');
Route::get('/article/app', 'CategoryController@index');
Route::resource('/bookings/bookfinish', 'BookingController');




