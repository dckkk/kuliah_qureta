<?php

	function enrolled($courseId) {
	    $enrolls = App\Enrolls::where('course_id', $courseId)->where('email', Auth::user()->email)->get();
	    if (count($enrolls) > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function liked($courseId) {
	    $enrolls = App\Enrolls::where('course_id', $courseId)->where('email', Auth::user()->id)->get();
	    if (count($enrolls) > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function courseUser($courseId) {
	    $enrolls = App\Enrolls::where('course_id', $courseId)->count();
	    return $enrolls;
	}

	function courseLikes($courseId) {
	    $likes = App\Likes::where('course_id', $courseId)->count();
	    return $likes;
	}

	function courseEmail($courseId) {
		$enrolls = App\Enrolls::select('email')->where('course_id', $courseId)->get();
		return $enrolls;
	}

	function courseJob($email) {
		$job = App\User::select('profession')->where('email', $email)->get();
		return $job;
	}

	function userProfile($id) {
		$user = App\User::select('name', 'profession')->where('id', $id)->get();
		return $user;
	}

	function get_user_profesi($user_id) {
	    return App\User_metum::where('user_id', '=', $user_id)->where('meta_name', '=', 'profesi')->pluck('meta_value')->first();
	}

?>
