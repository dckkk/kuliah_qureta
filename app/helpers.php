<?php

	function enrolled($courseId, $email) {
	    $enrolls = App\Enrolls::where('course_id', $courseId)->where('email', $email)->get();
	    if (count($enrolls) > 0) {
	        return true;
	    } else {
	        return false;
	    }
	} 

?>