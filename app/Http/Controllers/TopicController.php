<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topics;
use App\Course;

class TopicController extends Controller
{
    public function index($id) {
    	$topics = Topics::where('id', $id)->get();

    	$course = Course::with('topics', 'teachers')->whereHas('topics', function($query) use ($id) {
    		$query->where('id', $id);
    	})->where('topic_id', $id)->take(4)->get();

    	return view('topic', compact('course', 'topics'));
    }
}
