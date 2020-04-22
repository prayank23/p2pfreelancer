<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/','AdminController@viewdashboard')->name('admin.dashboard');
    Route::get('/users/queries','AdminController@usersQueries')->name('admin.users.queries');
    Route::get('/get/modal/query','AdminController@getUserQueryModalData')->name('admin.get-query-modal-data');
    Route::post('/post/query/status','AdminController@postUserQueryStatus')->name('admin.post.query.status');
    Route::get('/query/delete/{query}','AdminController@deleteUserQuery')->name('user.query.delete');
    Route::get('/users/view','AdminController@viewusers')->name('admin.users.view.all');
    Route::get('/user/delete/{user}','AdminController@deleteUser')->name('admin.user.delete');
    Route::get('/user/edit/{user}','AdminController@editUser')->name('admin.user.edit');
    Route::post('/user/update','AdminController@updateUser')->name('admin.post.user.edit');
    Route::get('/login/edit','AdminController@adminLoginDetailsView')->name('admin.login.edit');
    Route::post('/login/store','AdminController@storeAdminLogin')->name('admin.post.login.details');

    //gigs routes
    Route::get('/gigs/category/create','AdminController@createGigCategory')->name('admin.gig.category.create');
    Route::get('/gigs/category','AdminController@viewGigCategory')->name('admin.gig.category.view');
    Route::post('/gig/category/store','AdminController@storeCreateGigCategory')->name('admin.post.gig.category.create');
    Route::get('/gig/category/edit/{gigCategory}','AdminController@editGigCategory')->name('admin.gig.category.edit');
    Route::post('/gig/category/update/{gigCategory}','AdminController@updateGigCategory')->name('admin.update.gig.category');
    Route::get('/gig/category/delete/{gigCategory}','AdminController@deleteGigCategory')->name('admin.gig.category.delete');

    //user detail field
    Route::get('/user/detail/field','AdminController@storeUserDetailField')->name('userdatail.field.store');
});



//auth routes

    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');
