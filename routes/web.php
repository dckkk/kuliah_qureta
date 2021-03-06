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
// Route::get('/', function(){
// 	return '<h1>Sedang Dalam perbaikan !</h1>';
// });

Auth::routes();

Route::group(array('prefix' => 'admin', 'middleware' => 'AuthAdmin'), function() {
    // main page for the admin section (app/views/admin/dashboard.blade.php)
//    Route::get('/', function() {
//        return View::make('admin.index');
//    });
    Route::get('/', 'Admin\\TeacherController@index');
    Route::resource('/teacher', 'Admin\\TeacherController');
    Route::resource('/course', 'Admin\\CourseController');
    Route::resource('/course/enrollees', 'Admin\\CourseController@enrollees');
    //Route::resource('/course/enrollees/data/{a}', 'Admin\\CourseController@enrolleesData');
    Route::resource('/chapter', 'Admin\\ChapterController');
    Route::resource('/lecture', 'Admin\\LectureController');
    Route::resource('/pages', 'Admin\\PagesController');
    Route::resource('/quiz', 'Admin\\QuizController');
    Route::resource('/quiz_questions', 'Admin\\QuizQuestionsController');
    Route::resource('/quiz_answer', 'Admin\\QuizAnswerController');
});

// Route::get('/login', 'Auth\LoginController@showLoginForm');
// Route::post('/login', 'Auth\LoginController@authenticate');
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
// Route::post('/register', 'Auth\RegisterController@register');
// Route::post('/logout', 'Auth\LoginController@logout');
// Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::get('/login', function(){
    return Redirect::to('https://www.qureta.com/login');
});

Route::get('/register', function(){
    return Redirect::to('https://www.qureta.com/register');
});

Route::get('/home', 'HomeController@index');
Route::get('/home/{a}', 'HomeController@index');
Route::get('/home/{a}/{b}', 'HomeController@index');
Route::get('/profile/{a}', 'ProfileController@index');
Route::get('/search/', 'HomeController@show');
// Route::get('/search', 'HomeController@show');


Route::get('/course/{a}', 'CourseController@index');
Route::get('/course/{a}/{b}', 'CourseController@index');
Route::get('/course/{a}/{b}/{c}', 'CourseController@index');

Route::get('/teacher/{a}', 'TeacherController@index');
Route::get('/topic/{a}', 'TopicController@index');

Route::get('/page/{a}', 'PageController@index');

//api
Route::post('/api/enrolls', 'EnrollsController@enrolls');
Route::post('/api/unenrolls', 'EnrollsController@unenrolls');
Route::get('/api/showmore/{a}/{b}', 'EnrollsController@showmore');
Route::get('/api/showlast/{a}/{b}', 'EnrollsController@showlast');
Route::get('/api/countuser/{a}', 'EnrollsController@countUser');
Route::get('/api/enrolled/{a}/{b}', 'EnrollsController@enrolled');
Route::post('/api/banned', 'EnrollsController@banned');
Route::post('/api/unbanned', 'EnrollsController@unbanned');
Route::get('/api/chapters/{a}', 'EnrollsController@chapters');
Route::get('/enrollNow/{a}', 'EnrollsController@now');
Route::post('/api/like', 'EnrollsController@like');
Route::post('/api/unlike', 'EnrollsController@unlike');
