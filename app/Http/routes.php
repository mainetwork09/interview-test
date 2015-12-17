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
    return view('index');
})->before('guest');

Route::group(['middleware' => 'guest'], function()
{
    Route::get('/', function () {
	    return view('index');
	})->before('guest');
});

Route::post('users/login', 'Auth\AuthController@postLogin');
Route::get('users/logout', 'Auth\AuthController@getLogout');
/*
Route::get('users/register', 'Auth\AuthController@getRegister');
Route::post('users/register', 'Auth\AuthController@postRegister');
*/
/* Authenticated users */
Route::group(['middleware' => 'auth'], function()
{
    Route::get('users', array('as'=>'users', 'uses'=>'UserController@index'));
    Route::post('users/update/{id}', array('as'=>'users/update', 'uses'=>'UserController@update'));
});

//Route::resource('courses', 'CourseController');

Route::get('courses', array('as'=>'courses', 'uses'=>'CourseController@index'));
Route::group(['middleware' => ['auth','can_create_course']], function()
{
    Route::get('courses/create', array('as'=>'courses/create', 'uses'=>'CourseController@create'));
    Route::post('courses/store', array('as'=>'courses/store', 'uses'=>'CourseController@store'));
    Route::get('courses/edit/{id}', array('as'=>'courses/edit', 'uses'=>'CourseController@edit'));
	Route::post('courses/update/{id}', array('as'=>'courses/update', 'uses'=>'CourseController@update'));
});
Route::get('courses/json', array('as'=>'courses/json', 'uses'=>'CourseController@json'));
Route::get('courses/{id}', array('as'=>'courses', 'uses'=>'CourseController@show'));



//can_create_course