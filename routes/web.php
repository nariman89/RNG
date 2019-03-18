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

Route::view('/', 'welcome');

Auth::routes();

Route::get('category/{Category}', 'HomeController@adsByCategory');

Route::post('/layouts/adsCategory', 'ArticleController@store');
Route::post('/projects', 'CategoryController@store');
Route::get('showDetail/{id}','HomeController@adsDetails');
// Route::get('bookfinish/{id}','BookingController@finish');


Route::get('/projects/index', 'HomeController@index');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');
//

Route::middleware(['auth'])->group(function() {
Route::get('/projects/myarticles', function () {
	return view('/projects/myarticles');
});
Route::get('/layouts/bookfinish', function () {
	return view('/layouts/bookfinish');
});




});
Route::resource('admin/article', 'admin\ArticleController')->middleware('Isadmin');
Route::delete('article/{id}', 'admin\ArticleController@destroy');


// Route::get('book/{id}', 'BookingController@index');
 Route::get('/layouts/bookfinish', 'BookingController@index');
  Route::get('/layouts/bookfinish', 'BookingController@show');


// Route::get('layouts/showfinish', 'BookingController@show');
Route::post('/layouts/showDetail', 'BookingController@store');





Route::middleware(['auth'])->group(function() {
Route::get('/layouts/adsCategory', 'ArticleController@create');

	Route::resource('/projects', 'ArticleController');
	Route::get('/dashboard', 'DashboardController@index');
});
