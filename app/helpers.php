<?php

	function enrolled($courseId) {
	    $enrolls = App\Enrolls::where('course_id', $courseId)->where('email', Auth::user()->email)->get();
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
	
?>