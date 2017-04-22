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
Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');

Route::group(['middleware' => ['web']], function() {

    // Site routes
    Route::get('/', 'SiteController@index')->name('site.index');
    Route::get('/serial/{serial}/show', 'SiteController@show')->name('site.show');



    Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');


        /**
         * Serials
         */

        Route::get('serials', 'SerialController@index')->name('admin.serial.index');
        Route::any('serials/create', 'SerialController@create')->name('admin.serial.create');
        Route::post('serial/{serial}/update', 'SerialController@create')->name('admin.serial.update');
        Route::get('serial/{serial}/edit', 'SerialController@edit')->name('admin.serial.edit');
        Route::post('serial/{serial}/delete', 'SerialController@delete')->name('admin.serial.delete');
        Route::get('serial/{serial}/remove-picture', 'SerialController@removePicture')->name('serial.remove.picture');



        /**
         * Seasons
         */

        Route::get('seasons/{serial}/list', 'SeasonController@index')->name('admin.seasons.index');
        Route::any('season/create', 'SeasonController@create')->name('admin.season.create');
        Route::post('season/{season}/update', 'SeasonController@create')->name('admin.season.update');
        Route::get('season/{season}/edit', 'SeasonController@edit')->name('admin.season.edit');
        Route::post('season/{season}/delete', 'SeasonController@delete')->name('admin.season.delete');
        Route::get('season/{season}/remove-picture', 'SeasonController@removePicture')->name('season.remove.picture');
        Route::post('season/search', 'SeasonController@search')->name('seasons.search');


        /**
         * Episodes
         */

        Route::get('episodes/{season}', 'EpisodeController@index')->name('admin.episode.index');
        Route::any('episode/create', 'EpisodeController@create')->name('admin.episode.create');
        Route::post('episode/{episode}/update', 'EpisodeController@create')->name('admin.episode.update');
        Route::get('episode/{episode}/edit', 'EpisodeController@edit')->name('admin.episode.edit');
        Route::post('episode/{episode}/delete', 'EpisodeController@delete')->name('admin.episode.delete');

        
        /**
         * Genres
         */

        Route::get('genres', 'GenresController@index')->name('admin.genres.index');
        Route::any('genre/create', 'GenreController@create')->name('admin.genre.create');
        Route::post('genre/{genre}/update', 'GenreController@update')->name('admin.genre.update');
        Route::get('genre/{genre}/edit', 'GenreController@edit')->name('admin.genre.edit');
        Route::post('genre/{genre}/delete', 'GenreController@delete')->name('admin.genre.delete');
        Route::get('genre/{genre}/check', 'GenreController@check')->name('admin.genre.check');

    });

});





