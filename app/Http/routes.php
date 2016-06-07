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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helper_collection', [
    'uses' => 'TestController@helperCollection',
    'as' => 'helper_collection'
]);

Route::get('/class_collection', [
    'uses' => 'TestController@classCollection',
    'as' => 'class_collection'
]);

Route::get('/users', [
    'uses' => 'TestController@getUsers',
    'as' => 'users'
]);

Route::get('/first_user', [
    'uses' => 'TestController@firstUser',
    'as' => 'first_user'
]);
