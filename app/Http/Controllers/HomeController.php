<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teachers;

use App\Course;

use App\Topics;

use App\Slider;

use App\Pages;

class HomeController extends Controller
{
    public function index($topic="", $show="") {
    	//get data teacher
    	$teachers = Teachers::take(5)->get();
    	
    	//get data topic
    	$topics = Topics::all();

    	//get data pages
    	$pages = Pages::all();

    	//set limited show
    	$shows = $show * 4;

    	//get image slider
    	$slider = Slider::all();

    	//show all data
    	if(!empty($show)) {
    		$courseLast = Course::with('topics', 'teachers')->orderBy('id', 'desc')->take($shows)->get();
    		$show = $show + 1;
    	} else {
    		$courseLast = Course::with('topics', 'teachers')->orderBy('id', 'desc')->take(4)->get();
    	}
    	if ($topic == 1) {
	    	$courseIs = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 1);
	    	})->where('topic_id', 1)->get();
    	} else {
    		$courseIs = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 1);
	    	})->where('topic_id', 1)->take(4)->get();
    	}
    	
    	if ($topic == 2) {
	    	$courseEb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 2);
	    	})->where('topic_id', 2)->get(); 
    	} else {
    		$courseEb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 2);
	    	})->where('topic_id', 2)->take(4)->get();
    	}
    	
    	if ($topic == 3) {
	    	$courseSt = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 3);
	    	})->where('topic_id', 3)->get(); 
    	} else {
    		$courseSt = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 3);
	    	})->where('topic_id', 3)->take(4)->get();
    	}
    	
    	if ($topic == 4) {
	    	$courseIk = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 4);
	    	})->where('topic_id', 4)->get(); 
    	} else {
    		$courseIk = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 4);
	    	})->where('topic_id', 4)->take(4)->get();
    	}
    	
    	if ($topic == 5) {
	    	$courseSb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 5);
	    	})->where('topic_id', 5)->get(); 
    	} else {
    		$courseSb = Course::with('topics', 'teachers')->whereHas('topics', function($query) {
	    		$query->where('id', 5);
	    	})->where('topic_id', 5)->take(4)->get();
    	}

    	return view('index', compact('teachers', 'topics', 'courseLast', 'courseIs', 'courseEb', 'courseSt', 'courseIk', 'courseSb', 'show', 'slider', 'pages'));
    }
}
