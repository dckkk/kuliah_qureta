<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Teachers;

class TeacherController extends Controller
{
    public function index($id) {
    	$teachers = Teachers::where('id', $id)->get();
    	$course = Course::with('topics', 'teachers', 'teachers2', 'teachers3')->whereHas('teachers', function($query) use ($id) {
    		$query->where('id', $id);
    	})->orWhereHas('teachers2', function($query) use($id) {
    		$query->where('id', $id);
    	})->orWhereHas('teachers3', function($query) use($id) {
    		$query->where('id', $id);
    	})->where('teacher_id1', $id)->orWhere('teacher_id2', $id)->orWhere('teacher_id3', $id)->get();

    	// dd($course);

    	return view('teacher', compact('teachers', 'course'));
    }

}
