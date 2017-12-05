<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolls;
use App\Course;
use App\Topic;
use App\User;
use App\Chapters;
use App\Likes;
use Auth;


class EnrollsController extends Controller
{
    public function enrolls(Request $request) {

        $requestData = $request->all();
        Enrolls::create($requestData);
        $count = Enrolls::where('course_id', $request->course_id)->count();

        $result = $count;

        return $result;
    }

    public function unenrolls(Request $request) {

        // $requestData = $request->all();
        Enrolls::where('course_id', $request->course_id)->where('email', $request->email)->delete();
        $count = Enrolls::where('course_id', $request->course_id)->count();

        $result = $count;

        return $result;
    }

    public function like(Request $request) {

        $requestData = $request->all();
        Likes::create($requestData);
        $count = Likes::where('course_id', $request->course_id)->count();

        $result = $count;

        return $result;
    }

    public function unlike(Request $request) {

    	// $requestData = $request->all();
    	Likes::where('course_id', $request->course_id)->where('user_id', $request->user_id)->delete();
        $count = Likes::where('course_id', $request->course_id)->count();

    	$result = $count;

    	return $result;
    }

    public function showmore($topic, $row) {
        $date = date("Y-m-d");
    	$size = 4;
    	$limit = $row * $size;
    	$course = Course::with('topics', 'teachers', 'teachers2', 'teachers3')->whereHas('topics', function($query) use ($topic) {
    		$query->where('id', $topic);
    	})->where('topic_id', $topic)->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->orderBy('id', 'desc')->skip($limit)->take($size)->get();
    	
    	$arr = array();
    	foreach ($course as $key => $value) {
    		$count  = $this->countUser($value->id);
    		$value['count'] = $count;
    		$arr[] = $value;
    	}

    	return $arr;
    } 
    public function showlast($topic, $row) {
        $date = date("Y-m-d");
    	$size = 4;
    	$limit = $row * $size;
    	$course = Course::with('topics', 'teachers', 'teachers2', 'teachers3')->where('enrolls_start', '<=', $date)->where('enrolls_end', '>=', $date)->orderBy('id', 'desc')->skip($limit)->take($size)->get();
    	
    	$arr = array();
    	foreach ($course as $key => $value) {
    		$count  = $this->countUser($value->id);
    		$value['count'] = $count;
    		$arr[] = $value;
    	}

    	return $arr;
    }

    public function countUser($courseId) {
    	$enrolls = Enrolls::where('course_id', $courseId)->count();
	    return $enrolls;
    }

    public function enrolled($courseId, $email) {
	    $enrolls = Enrolls::where('course_id', $courseId)->where('email', $email)->count();
	    return $enrolls;
	}

	public function banned(Request $request) {
		$request['status'] = "banned";
		$requestData = $request->all();

		$user = User::findOrFail($request->id);
		$user->update($requestData);
		
		$result = "banned";

		return $result;
	}

    public function unbanned(Request $request) {
        $request['status'] = "active";
        $requestData = $request->all();

        $user = User::findOrFail($request->id);
        $user->update($requestData);

        $result = "active";

        return $result;
    }

	public function chapters($courseId) {
		$chapter = Chapters::where('course_id', $courseId)->get();
        $values = array();
        $array = array();

        foreach ($chapter as $key => $value) {
            $values['id'] = $value->id;
            $values['name'] = $value->name;
            array_push($array, $values);
        }

		return $array;
	}

    public function now($slug) {
        $course = Course::select('id')->where('slug', $slug)->get();
        $course_id = $course[0]['id'];
        $request = array("course_id" => $course_id, "email" => Auth::user()->email);
        Enrolls::create($request);
        $url = "course/".$slug;

        return redirect($url);

    }
}
