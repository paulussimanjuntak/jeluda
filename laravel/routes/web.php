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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::resource('/jelajah', 'JelajahController');
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'adminController@dashboard');
    Route::put('/admin/{id}', 'adminController@konfirmasi');
});

Route::prefix('jelajah-comment')->group(function () {
Route::post('{id}' , 'JelajahCommentController@store');
Route::get('{id}/edit' , 'JelajahCommentController@edit');
Route::put('{id}' , 'JelajahCommentController@update');
Route::delete('{id}' , 'JelajahCommentController@destroy');
});

Route::get('/profile/{id?}', 'ProfileController@halamanprofile');
Route::prefix('ubah-profile')->group(function () {
Route::get('{id}', 'ProfileController@ubahprofile');
Route::put('{id}', 'ProfileController@update');
});

Route::get('/jelajah/filter/{provinsi}','FilterController@filter');
Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify');
