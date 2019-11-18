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

Route::get('/', 'PagesController@home')->name('fam');

Route::get('/about-female-and-more', 'PagesController@aboutFam')->name('about');

Route::get('/how-to-participate', 'PagesController@howToParticipate')->name('how-to-participate');
Route::get('/how-to-start-a-chapter', 'PagesController@howToStartAChapter')->name('how-to-start-a-chapter');
Route::get('/causes', 'PagesController@causes')->name('causes');
Route::get('/learders-board', 'PagesController@leardersBoard')->name('learders-board');
Route::get('/gallary', 'PagesController@gallary')->name('gallary');



Route::get('/stories', function(){
    return view('frontend.pages.stories');
})->name('stories');

Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

