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


Route::get('/', 'Music\IndexController');

Route::get('artist/{id}', 'Music\ArtistController');
Route::get('station/{id}', 'Music\StationController');
Route::get('song/{id}', 'Music\SongController');
Route::get('genre/{id}', 'Music\GenreController');

Route::get('search/{id}', 'Music\SearchController');
