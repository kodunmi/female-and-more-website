<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Auth;

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

/**
 * test route for demos
 *
 */
Route::get('/maildemo', function () {
    return view('frontend.emails.result-notification-mail');
});


/**
 * this are pages route accessable to guest
 *
 */
Route::get('/', 'PagesController@home')->name('fam');
Route::get('/about-female-and-more', 'PagesController@aboutFam')->name('about');
Route::get('/how-to-participate', 'PagesController@howToParticipate')->name('how-to-participate');
Route::get('/how-to-start-a-chapter', 'PagesController@howToStartAChapter')->name('how-to-start-a-chapter');
Route::get('/causes', 'PagesController@causes')->name('causes');
Route::get('/learders-board', 'PagesController@leardersBoard')->name('learders-board');
Route::get('/gallary', 'PagesController@gallary')->name('gallary');
Route::get('/users/{username}', 'PagesController@profile')->name('profile');
Route::get('/users', 'PagesController@users')->name('users');


/**
 * this are admin register and login route
 *
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/register', 'SessionController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'SessionController@register')->name('admin.register.submit');
    Route::get('/login', 'SessionController@showLoginForm')->name('admin.login');
    Route::post('/login', 'SessionController@login')->name('admin.login.submit');
    Route::post('/profile', 'SessionController@login')->name('admin.profile');
});


/**
 * this are admin crud route protected by admin guard
 *
 */
Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('/logout','SessionController@logout')->name('admin.logout');
    Route::get('/dashboard/all-users', 'AdminController@allUsers')->name('all-users');
    Route::post('/start-level/{level}', 'LevelController@startLevel')->name('level.start');
    Route::get('/dashboard', 'AdminController@home')->name('admin.dashboard');
    Route::resource('level', 'LevelController');
    Route::resource('story', 'StoryController')->except('show');
    Route::resource('quote', 'QuoteController');
});


/**
 * laravel auth | for user authenticaion
 *
 */
Auth::routes(['verify' => true]);
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('affiliate.tracking');
Route::get('logout', 'Auth\LoginController@logout');


/**
 * user protected route
 *
 *
 * protected with verified
 */
Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/level/{id}/stories', 'PagesController@stories')->name('stories');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('user.dashboard');
    Route::post('/dashboard/profile-update/{id}', 'DashboardController@profileUpdate')->name('user.update');
    Route::get('/level/{level_id}/story/{story_id}', 'StoryController@show');
    Route::get('/stories/{story}', 'StoryController@show')->name('story.show');
    Route::post('/answer/{story_number}', 'StoryController@submitDayAnswer')->name('response.submit');

});
