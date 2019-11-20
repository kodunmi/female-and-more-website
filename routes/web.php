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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/register', 'SessionController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'SessionController@register')->name('admin.register.submit');
    Route::get('/login', 'SessionController@showLoginForm')->name('admin.login');
    Route::post('/login', 'SessionController@login')->name('admin.login.submit');
    Route::get('/logout','SessionController@logout')->name('admin.logout');
    Route::get('/profile','AdminController@profile')->name('admin.profile');
    Route::post('/profile/update/{id}','AdminController@profileUpdate')->name('admin.profile.update');

    //this for adding viewing and deleting category
    Route::get('/add-category', 'CategoryController@showCatForm')->name('add-cat');
    Route::post('/add-category', 'CategoryController@addCategory');
    Route::get('/view-category', 'CategoryController@viewCategory')->name('view-cat');
    Route::post('/edit-category/{id}', 'CategoryController@editCategory');
    Route::get('/delete-category/{id}', 'CategoryController@deleteCategory');
    // this for adding deleting templates
    Route::get('/add-template', 'TemplateController@showTmpForm')->name('add-tmp');
    Route::post('/add-template', 'TemplateController@addTemplate');
    Route::get('/view-template', 'TemplateController@viewTemplate')->name('view-tmp');
    Route::post('/edit-template/{id}', 'TemplateController@editTemplate');
    Route::get('/delete-template/{id}', 'TemplateController@deleteTemplate');

});
Route::get('/test', function() {
    return view('admin.pages.home');
});




Route::get('/stories', function(){
    return view('frontend.pages.stories');
})->name('stories');

Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

