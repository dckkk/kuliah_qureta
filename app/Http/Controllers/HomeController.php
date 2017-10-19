<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teachers;

use App\Course;

use App\Topics;

use App\Slider;

use App\Pages;

use App\Enrolls;

use Auth;

class HomeController extends Controller
{
    public function index($topic="", $show="") {
        //date now
        $date = date("Y-m-d");

    	//get data teacher
    	$teachers = Teachers::inRandomOrder()->take(5)->get();
    	
    	//get data topic
    	$topics = Topics::all();

    	//get data pages
    	$pages = Pages::all();

    	//set limited show
    	$shows = $show * 4;

    	//get image slider
    	$slider = Slider::all();

        $auth = Auth::user();

    	//show all data
		$courseLast = Course::with('topics', 'teachers')->orderBy('id', 'desc')->inRandomOrder()->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->take(4)->get();
	
    
		$courseIs = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
    		$query->where('id', 1);
    	})->where('topic_id', 1)->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->take(4)->get();
    	
		$courseEb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
    		$query->where('id', 2);
    	})->where('topic_id', 2)->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->take(4)->get();
    	
	    $courseSt = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 3);
	    	})->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->where('topic_id', 3)->get(); 
    	
	    $courseIk = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 4);
	    	})->where('topic_id', 4)->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->take(4)->get(); 
    	
	    $courseSb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 5);
	    	})->where('topic_id', 5)->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->take(4)->get(); 
    	
    	return view('index', compact('teachers', 'topics', 'courseLast', 'courseIs', 'courseEb', 'courseSt', 'courseIk', 'courseSb', 'show', 'slider', 'pages', 'auth'));
    }

    public function show(Request $request) {
        $keyword = $request->search;

        $teachers = Teachers::where('name', 'like', '%'.$keyword.'%')->get();
        $course = Course::with('topics', 'teachers')->where('name', 'like', '%'.$keyword.'%')->get();

        return view('result', compact('teachers', 'course', 'keyword'));
    }
}
