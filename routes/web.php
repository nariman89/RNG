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
//det går inte att ta bort den här route fast vi har en resource route

Route::get('/category/{id}', 'PageController@adsByCategory');
Route::get('/projects/myarticles', 'PageController@show');
Route::resource('article', 'ArticleController');
Route::resource('/bookings/bookfinish', 'BookingController');
Route::get('admin/article ', 'PageController@admin')->middleware('Isadmin');
Route::view('layouts/app/', 'CategoryController@index');
Route::get('/back/article/createCat', 'CategoryController@create');
Route::post('/admin/article', 'CategoryController@store');
Route::get('/basket', 'BasketController@index');
