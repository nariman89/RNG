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
Route::get('/article/index', 'ArticleController@index');
//det går inte att ta bort den här route fast vi har en resource route
Route::middleware(['auth'])->group(function() {
Route::get('/article/adsArticle', 'ArticleController@create');
});
Route::post('/article/adsArticle', 'ArticleController@store');
Route::get('/article/{id}', 'ArticleController@edit');
Route::post('/article/{article}', 'ArticleController@update');
Route::post('/category/{category}', 'CategoryController@update');
Route::get('showDetail/{id}','ArticleController@show');
Route::get('/projects/myarticles', 'PageController@show');
Route::resource('/bookings/bookfinish', 'BookingController');
Route::get('/category/{id}', 'PageController@adsByCategory');
Route::get('admin/article ', 'PageController@admin')->middleware('Isadmin');
Route::get('/back/article/createCat', 'CategoryController@index');
Route::get('/back/article/createCat', 'CategoryController@create');
Route::post('/admin/article', 'CategoryController@store');
Route::resource('/back', 'CategoryController');

