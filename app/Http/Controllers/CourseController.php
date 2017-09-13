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

    	$topic_id = $course[0]['topic_id'];
    	//get data pages
    	$pages = Pages::all();

    	//get materi terkait
    	$materi = Course::with('topics', 'teachers')->whereHas('topics', function($query) use ($topic_id) {
    		// $topic_id = '1';
	    		$query->where('id', $topic_id);
	    	})->where('topic_id', $topic_id)->get();
 
    	return view('course.index', compact('course', 'pages', 'materi'));
    }

}
