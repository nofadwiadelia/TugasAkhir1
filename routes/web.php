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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Welcome@index')->name('welcome');
// Route::resource('/searchs', 'SearchController@searching');
Route::resource('search', 'SearchController');
Route::post('search/cari', ['uses' => 'SearchController@searching', 'as' => 'cari_buku']);
// Route::get('search', 'SearchController@index');
Auth::routes();

// Route::get('/search', 'SearchController@index');
Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('/buku', 'BukuController');

Route::resource('buku', 'BukuController');
Route::resource('welcome', 'Welcome');
Route::resource('user', 'User');
Route::get('/user', function () {
    return view('user');
});
Route::get('/user', 'User@index')->name('user');

Route::get('/buku_create', function () {
    return view('buku_create');
});
//Route::resource('search', 'SearchController');
Route::get('/search_query', 'SearchController@searchQuery');
Route::get('/srch', 'SearchController@index');

Route::resource('/detailbuku', 'DetailBuku');
Route::resource('detailbuku', 'DetailBuku');

Route::get('/cari', 'SearchController@index');