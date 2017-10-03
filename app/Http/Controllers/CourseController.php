<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teachers;

use App\Course;

use App\Topics;

use App\Slider;

use App\Pages;

use App\Chapters;

use App\Lectures;

use App\Quiz;

use App\QuizQuestion;

use App\QuizAnswer;

class CourseController extends Controller
{
    public function index($slug,$slug_chapter="",$slug_lecture="") {
        //get data course
    	$course = Course::with('topics', 'teachers')->where('slug', $slug)->get();

        //set topic id
        $topic_id = $course[0]['topic_id'];

    	//set course id
        $course_id = $course[0]['id'];

        
        //get data pages
        $pages = Pages::all();

        //get materi terkait
        $materi = Course::with('topics', 'teachers')->whereHas('topics', function($query) use ($topic_id) {
            // $topic_id = '1';
                $query->where('id', $topic_id);
            })->where('topic_id', $topic_id)->get();

        //get data chapters
        $chapters = Chapters::where('course_id', $course_id)->get();
        
        //set default video
        $url_video = $chapters[0]['url_video'];

        //get data lecture
        $lectures = Lectures::all();

        if($slug_chapter !== "" && $slug_lecture == "") {
            $url_videos = Chapters::select('url_video')->where('slug', $slug_chapter)->get();
            $url_video = $url_videos[0]['url_video'];
        } elseif($slug_lecture !== "") {
            $url_videos = Lectures::select('url_video')->where('slug', $slug_lecture)->get();
            $url_video = $url_videos[0]['url_video'];
        }

        //get data quiz
        $quiz = Quiz::with('course')->whereHas('course', function($query) use($course_id){
            $query->where('id', $course_id);
        })->where('course_id', $course_id)->get();

 
    	return view('course.index', compact('course', 'pages', 'materi', 'chapters', 'lectures', 'url_video', 'quiz'));
    }

}
