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
Route::get('/article/index', 'ArticleController@index');

Route::post('/article/adsArticle', 'ArticleController@store');
Route::get('/category/{id}', 'PageController@adsByCategory');
 Route::get('showDetail/{id}','ArticleController@adsDetails');

Route::get('/projects/myarticles', 'PageController@show');
Route::resource('/article', 'ArticleController');
Route::resource('/bookings/bookfinish', 'BookingController');
Route::get('admin/article ', 'PageController@admin')->middleware('Isadmin');
Route::get('/back/article/createCat', 'CategoryController@index');
Route::post('/admin/article', 'CategoryController@store');



