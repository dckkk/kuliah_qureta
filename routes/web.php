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

Auth::routes();

Route::group(array('prefix' => 'admin', 'middleware' => 'AuthAdmin'), function() {
    // main page for the admin section (app/views/admin/dashboard.blade.php)
//    Route::get('/', function() {
//        return View::make('admin.index');        
//    });
    Route::get('/', 'Admin\\TeacherController@index');
});

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
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

Route::get('/page/{a}', 'PagesController@index');




Route::get('/home', 'HomeController@index');
