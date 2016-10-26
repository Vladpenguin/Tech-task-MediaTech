<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'ProfileController@index');
    Route::get('/profile', 'ProfileController@index');
    Route::resource('/profile/tasks', 'TaskController');
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::patch('/change-password', 'ProfileController@changePassword');
Auth::routes();

//Route::get('/home', 'HomeController@index');
