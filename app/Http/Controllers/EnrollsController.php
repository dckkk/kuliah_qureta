<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolls;
use App\Course;
use App\Topic;
use App\User;


class EnrollsController extends Controller
{
    public function enrolls(Request $request) {

    	$requestData = $request->all();
    	Enrolls::create($requestData);

    	$result = json_encode(["status" => 200, "response" => "ok"]);

    	return $result;
    }

    public function unenrolls(Request $request) {

    	// $requestData = $request->all();
    	Enrolls::where('course_id', $request->course_id)->where('email', $request->email)->delete();

    	$result = json_encode(["status" => 200, "response" => "ok"]);

    	return $result;
    }

    public function showmore($topic, $row) {
    	$size = 4;
    	$limit = $row * $size;
    	$course = Course::with('topics', 'teachers')->whereHas('topics', function($query) use ($topic) {
    		$query->where('id', $topic);
    	})->where('topic_id', $topic)->skip($limit)->take($size)->get();
    	
    	$arr = array();
    	foreach ($course as $key => $value) {
    		$count  = $this->countUser($value->id);
    		$value['count'] = $count;
    		$arr[] = $value;
    	}

    	return $arr;
    } 
    public function showlast($topic, $row) {
    	$size = 4;
    	$limit = $row * $size;
    	$course = Course::with('topics', 'teachers')->skip($limit)->take($size)->get();
    	
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
}
