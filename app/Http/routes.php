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

Route::get('/contains', [
    'uses' => 'TestController@contains',
    'as' => 'contains'
]);


Route::get('/where', [
    'uses' => 'TestController@where',
    'as' => 'where'
]);

Route::get('/filter', [
    'uses' => 'TestController@filter',
    'as' => 'filter'
]);

Route::get('/sort', [
    'uses' => 'TestController@sortData',
    'as' => 'sort'
]);

Route::get('/grouping', [
    'uses' => 'TestController@grouping',
    'as' => 'grouping'
]);

Route::get('/takeme', [
    'uses' => 'TestController@takeMe',
    'as' => 'takeme'
]);

Route::get('/chunk', [
    'uses' => 'TestController@chunkMe',
    'as' => 'chunk'
]);

Route::get('/map', [
    'uses' => 'TestController@mapMe',
    'as' => 'map'
]);

Route::get('/transform', [
    'uses' => 'TestController@transformMe',
    'as' => 'transform'
]);

Route::get('/reduce', [
    'uses' => 'TestController@reduceMe',
    'as' => 'reduce'
]);

Route::get('/each', [
    'uses' => 'TestController@eachMethod',
    'as' => 'each'
]);

Route::get('/union', [
    'uses' => 'TestController@union',
    'as' => 'union'
]);

Route::get('/intersect', [
    'uses' => 'TestController@intersect',
    'as' => 'intersect'
]);
