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

Route::get('/home', function () {
    return view('welcome');
});
//FavoriteImages Route
Route::resource('images','FavoriteImagesController');
Route::post('/save_images', 'FavoriteImagesController@store');
Route::get('/delete_images', 'FavoriteImagesController@delete_image');
Route::get('/delete_des', 'FavoriteImagesController@delete_des');