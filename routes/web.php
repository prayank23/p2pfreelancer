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
//admin routes

//front routes
Route::get('/', function () {
    dd(phpinfo());
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//users
Route::get('/profile', 'UserController@profile')->name('profile')->middleware('auth');
Route::post('/profile/save', 'UserController@postprofile')->name('user.postprofile')->middleware('auth');
Route::get('/user/profile/{user}', 'UserController@viewprofile')->name('user.profile');
Route::get('/user/services/{user}', 'UserController@viewglobalprofile')->name('user.mianprofile')->middleware('auth');
Route::post('/query/submit', 'UserController@submitquery')->name('user.query.submit.toadmin')->middleware('auth');
Route::get('/my/services' , 'UserController@myServices')->name('my.services');
Route::get('/my/reviews' , 'UserController@myReviews')->name('my.reviews');
Route::get('/my/projects' , 'UserController@myProjects')->name('my.projects');
Route::get('/user/reviews/{user}' , 'UserController@userReviews')->name('user.reviews');
//search route
Route::get('/search','SearchController@viewSearch')->name('search.view')->middleware('auth');
Route::post('/users/{user}/message','MessageController@sendMessage')->name('user.message.send');

Route::post('/user/switchprofile', 'UserController@switchprofile')->name('user.switch.profile');

//add service
Route::post('/service/add' , 'ServiceController@add')->name('add.service');
//hire consultant
Route::post('/hire' , 'ServiceController@hire')->name('hire.consultant');


Route::prefix('messenger')->group(function () {
    Route::get('/', 'MessageController@defaultLaravelMessenger')->name('default.messenger');
    Route::get('t/{id}', 'MessageController@laravelMessenger')->name('messenger');
    Route::post('send', 'MessageController@store')->name('message.store');
    Route::get('threads', 'MessageController@loadThreads')->name('threads');
    Route::get('more/messages', 'MessageController@moreMessages')->name('more.messages');
    Route::delete('delete/{id}', 'MessageController@destroy')->name('delete');
    // AJAX requests.
    Route::prefix('ajax')->group(function () {
        Route::post('make-seen', 'MessageController@makeSeen')->name('make-seen');
    });
});

Route::get('/my/wallet','WalletController@showWallet')->name('my.wallet');
Route::get('coingate','CoingateController@index')->name('coingate');