<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);
Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'show'
]);

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('admin/user', 'UserController@index');
Route::get('admin/settings', 'UserController@setting')->name('usersettings');
Route::post('admin/newemail', 'UserController@newEmail')->name('newEmail');
Route::post('admin/newpassword', 'UserController@newPassword')->name('newPassword');
