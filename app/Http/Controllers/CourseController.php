<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teachers;

use App\Course;

use App\Topics;

use App\Slider;

use App\Pages;

class CourseController extends Controller
{
    public function index($slug) {
    	$course = Course::with('topics', 'teachers')->where('slug', $slug)->get();

    	//get data pages
    	$pages = Pages::all();
 
    	return view('course.index', compact('course', 'pages'));
    }

}
