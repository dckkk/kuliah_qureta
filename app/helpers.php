<?php

	function enrolled($courseId) {
	    $enrolls = App\Enrolls::where('course_id', $courseId)->where('email', Auth::user()->email)->get();
	    if (count($enrolls) > 0) {
	        return true;
	    } else {
	        return false;
	    }
	} 
	
?>