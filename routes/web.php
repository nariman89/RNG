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
	Route::get('layouts/index', 'DashboardController@index'); //To index/dashboard page after registratioonnn
	Route::get('/layouts/adsArticle', 'ArticleController@create');
});

Route::get('category/{id}', 'HomeController@adsByCategory');
Route::get('layouts/{$article}', 'ArticleController@edit');

Route::resource('/categories', 'CategoryController');


Route::post('/layouts/adsArticle', 'ArticleController@store');
Route::post('/projects', 'CategoryController@store');
Route::get('showDetail/{id}','HomeController@adsDetails');


// Route::get('/redirect', 'SocialAuthFacebookController@redirect');
// Route::get('/callback', 'SocialAuthFacebookController@callback');


Route::middleware(['auth'])->group(function() {
Route::get('/projects/myarticles', function () {
	return view('/projects/myarticles');
});
Route::get('/bookings/bookfinish', function () {
	return view('/bookings/bookfinish');
});

Route::resource('admin/article', 'admin\ArticleController')->middleware('Isadmin');
});
Route::resource('/layouts/', 'ArticleController');

Route::get('/layouts/index', 'ArticleController@index');
Route::get('/layouts/app', 'CategoryController@index');

//


