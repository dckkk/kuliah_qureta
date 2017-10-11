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
		$courseLast = Course::with('topics', 'teachers')->orderBy('id', 'desc')->inRandomOrder()->take(4)->get();
	
    
		$courseIs = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
    		$query->where('id', 1);
    	})->where('topic_id', 1)->inRandomOrder()->take(4)->get();
    	
		$courseEb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
    		$query->where('id', 2);
    	})->where('topic_id', 2)->inRandomOrder()->take(4)->get();
    	
	    $courseSt = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 3);
	    	})->where('topic_id', 3)->get(); 
    	
	    $courseIk = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 4);
	    	})->where('topic_id', 4)->inRandomOrder()->take(4)->get(); 
    	
	    $courseSb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 5);
	    	})->where('topic_id', 5)->inRandomOrder()->take(4)->get(); 
    	
    	return view('index', compact('teachers', 'topics', 'courseLast', 'courseIs', 'courseEb', 'courseSt', 'courseIk', 'courseSb', 'show', 'slider', 'pages', 'auth'));
    }
}
