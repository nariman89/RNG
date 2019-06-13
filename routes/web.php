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
Route::get('/layouts/adsArticle', 'ArticleController@create');
});
Route::get('/layouts/index', 'PageController@index');

Route::get('/category/{id}', 'ArticleController@adsByCategory');
Route::get('/layouts/{article}', 'ArticleController@edit');
Route::resource('/categories', 'CategoryController');
Route::post('/layouts/adsArticle', 'ArticleController@store');
 Route::get('showDetail/{id}','ArticleController@adsDetails');
Route::middleware(['auth'])->group(function() {
Route::get('/projects/myarticles', function () {
	return view('/projects/myarticles');
});
// Route::get('/bookings/bookfinish', function () {
// 	return view('/bookings/bookfinish');
// });
Route::resource('admin/article', 'admin\ArticleController')->middleware('Isadmin');
});
Route::resource('/layouts/', 'ArticleController');
Route::get('/layouts/index', 'ArticleController@index');
Route::get('/layouts/app', 'CategoryController@index');
Route::resource('/bookings/bookfinish', 'BookingController');




