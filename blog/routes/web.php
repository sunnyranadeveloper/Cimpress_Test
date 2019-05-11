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
//frontend user's rout
Route::get('/', 'UserController@index');
Route::post('/', 'UserController@login');
Route::get('/dashboard', 'DashboardController@index')->middleware('user');
Route::get('/logout', 'UserController@index');
Route::get('/add', 'DashboardController@add')->middleware('user');
Route::get('/deleteUserPost{id}', 'DashboardController@deleteUserPost')->middleware('user');
Route::get('/mylist', 'DashboardController@mylist')->middleware('user');
Route::get('/editPost/{id}', 'DashboardController@editPost')->middleware('user');
Route::get('/deleteUserPost/{id}', 'DashboardController@deleteUserPost')->middleware('user');
Route::post('/addpost', 'DashboardController@savePost')->middleware('user');
Route::post('/editPost/{id}', 'DashboardController@updatePost')->middleware('user');

//admin user's route
Route::get('/admin', 'AdminController@index')->middleware('admin');
Route::get('/logout', 'UserController@index');
Route::get('/addAdmin', 'AdminController@add')->middleware('admin');
Route::get('/removedPosts', 'AdminController@removedPosts')->middleware('admin');
Route::get('/removePost/{id}', 'AdminController@removedPost')->middleware('admin');
Route::get('/restorePost/{id}', 'AdminController@restorePost')->middleware('admin');
Route::get('/editPostAdmin/{id}', 'AdminController@editPost')->middleware('admin');
Route::get('/addUser', 'AdminController@addUser')->middleware('admin');
Route::post('/addpostadmin', 'AdminController@savePost')->middleware('admin');
Route::post('/editPostAdmin/{id}', 'AdminController@updatePost')->middleware('admin');
Route::post('/addUser', 'AdminController@saveUser')->middleware('admin');

/*
Route::get('/', function () {
    return view('welcome');
});
*/