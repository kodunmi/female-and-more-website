<?php

use App\Level;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use App\Story;
use App\User;
use Illuminate\Support\Carbon;
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


Route::get('/maildemo', function () {
    return view('frontend.emails.result-notification-mail');
});
Route::get('/', 'PagesController@home')->name('fam');
Route::get('/about-female-and-more', 'PagesController@aboutFam')->name('about');
Route::get('/how-to-participate', 'PagesController@howToParticipate')->name('how-to-participate');
Route::get('/how-to-start-a-chapter', 'PagesController@howToStartAChapter')->name('how-to-start-a-chapter');
Route::get('/causes', 'PagesController@causes')->name('causes');
Route::get('/learders-board', 'PagesController@leardersBoard')->name('learders-board');
Route::get('/gallary', 'PagesController@gallary')->name('gallary');
Route::get('/users/{username}', 'PagesController@profile')->name('profile');
Route::get('/users', 'PagesController@users')->name('users');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/register', 'SessionController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'SessionController@register')->name('admin.register.submit');
    Route::get('/login', 'SessionController@showLoginForm')->name('admin.login');
    Route::post('/login', 'SessionController@login')->name('admin.login.submit');
    Route::post('/profile', 'SessionController@login')->name('admin.profile');
});
// Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {

//     // Route::get('/profile','AdminController@profile')->name('admin.profile');
//     // Route::post('/profile/update/{id}','AdminController@profileUpdate')->name('admin.profile.update');
// });

Route::prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('/logout','SessionController@logout')->name('admin.logout');
    Route::get('/dashboard/all-users', function () {
        $users = User::all();
        return view('admin.pages.view-users',['users' => $users]);
    })->name('all-users');
    Route::post('/start-level/{level}', 'LevelController@startLevel')->name('level.start');
    Route::resource('level', 'LevelController');
    Route::resource('season', 'SeasonController');
    Route::resource('story', 'StoryController')->except('show');
});


// Route::get('/test', function() {
//     return view('admin.pages.home');
// });




Route::get('/level/{id}/stories', 'PagesController@stories')->name('stories')->middleware('verified');

Auth::routes(['verify' => true]);
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('affiliate.tracking');
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('user.dashboard');
    Route::post('/dashboard/profile-update/{id}', 'DashboardController@profileUpdate')->name('user.update');
    Route::get('/level/{level_id}/story/{story_id}', 'StoryController@show');
    Route::get('/stories/{story}', 'StoryController@show')->name('story.show');
});


Route::get('/admin/dashboard', function () {
    return view('admin.pages.home');
})->name('admin.dashboard')->middleware('auth:admin');

// Route::get('/test', function () {
//     $story = Story::where('is_current','yes')->first();

//     if($story == null){
//         $first_story = Story::orderBy('story_number', 'asc')->first();
//         $first_story->is_current = 'yes';
//         $first_story->save();
//     }else{
//         $current_story = Story::where('is_current','yes')->first();

//         $next_story = Story::where('id', '>' , $current_story->id)->orderBy('id', 'asc')->first();

//         if($next_story != null){
//             $next_story->is_current = 'yes';
//             $next_story->save();
//         }

//         $current_story->is_current = 'no';
//         $current_story->is_completed = 'yes';
//         $current_story->save();
//     }


//         // $last_story = Story::where('is_completed','yes')->orderBy('story_number', 'desc')->value('story_number');


//     if(Story::orderBy('story_number', 'desc')->value('is_completed') == 'yes'){
//         $users = User::where('total_score', '>=' , 300)->get();
//             foreach($users as $user){
//                 $user->level_number = 2;
//                 $user->save();
//             }
//     }

// //

// });

Route::get('test/{id}', function ($id) {
    $story = Story::where('is_current','yes')->where('level_id',$id)->first();
    if($story == null){
        $first_story = Story::where('level_id',$id)->orderBy('story_number', 'asc')->first();
        $first_story->is_current = 'yes';
        $first_story->save();
    }else{
        $current_story = Story::where('is_current','yes')->where('level_id',$id)->first();
        $next_story = Story::where('level_id',$id)->where('id', '>' , $current_story->id)->orderBy('id', 'asc')->first();

        if($next_story != null){
            $next_story->is_current = 'yes';
            $next_story->save();
        }

        $current_story->is_current = 'no';
        $current_story->is_completed = 'yes';
        $current_story->save();

        dd($current_story);
    }


        // $last_story = Story::where('is_completed','yes')->orderBy('story_number', 'desc')->value('story_number');


    if(Story::where('level_id', $id)->orderBy('story_number', 'desc')->value('is_completed') == 'yes'){
        $users = User::where('level_id', $id)->where('total_score', '>=' , 300)->get();
            foreach($users as $user){
                $user->level_number = 2;
                $user->save();
            }
    }
});
