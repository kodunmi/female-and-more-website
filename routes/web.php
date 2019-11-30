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

use Illuminate\Routing\Console\MiddlewareMakeCommand;

Route::get('/', 'PagesController@home')->name('fam');
Route::get('/about-female-and-more', 'PagesController@aboutFam')->name('about');
Route::get('/how-to-participate', 'PagesController@howToParticipate')->name('how-to-participate');
Route::get('/how-to-start-a-chapter', 'PagesController@howToStartAChapter')->name('how-to-start-a-chapter');
Route::get('/causes', 'PagesController@causes')->name('causes');
Route::get('/learders-board', 'PagesController@leardersBoard')->name('learders-board');
Route::get('/gallary', 'PagesController@gallary')->name('gallary');
Route::get('/story-detail', 'PagesController@storyDetail')->name('story.detail');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/register', 'SessionController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'SessionController@register')->name('admin.register.submit');
    Route::get('/login', 'SessionController@showLoginForm')->name('admin.login');
    Route::post('/login', 'SessionController@login')->name('admin.login.submit');
    Route::get('/logout','SessionController@logout')->name('admin.logout');
    Route::get('/profile','AdminController@profile')->name('admin.profile');
    Route::post('/profile/update/{id}','AdminController@profileUpdate')->name('admin.profile.update');

});
Route::get('/test', function() {
    return view('admin.pages.home');
});




Route::get('/stories', function(){
    return view('frontend.pages.stories');
})->name('stories');

Auth::routes(['verify' => true]);
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('affiliate.tracking');
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('user.dashboard');
    Route::post('/dashboard/profile-update/{id}', 'DashboardController@profileUpdate')->name('user.update');
});


Route::get('/admin/dashboard', function () {
    return view('admin.pages.home');
})->name('admin.dashboard')->middleware('auth:admin');

