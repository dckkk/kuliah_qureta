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

Route::get('/', 'HomeController@index');

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/logout', 'Auth\LoginController@logout');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::get('/home', 'HomeController@index');
Route::get('/home/{a}', 'HomeController@index');
Route::get('/home/{a}/{b}', 'HomeController@index');


Route::get('/course/{a}', 'CourseController@index');
Route::get('/course/{a}/{b}', 'CourseController@index');
Route::get('/course/{a}/{b}/{c}', 'CourseController@index');




Route::get('/home', 'HomeController@index');
