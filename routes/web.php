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
Route::get('/', 'HomeController@index');

Route::resource('plant', 'PlantController');
Route::resource('user', 'UserController');
Route::resource('comment', 'CommentController');
Route::resource('rating', 'RatingController');

Route::post('/plant/{plant}/rate', 'PlantRatingController@store')->middleware('auth');

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});
