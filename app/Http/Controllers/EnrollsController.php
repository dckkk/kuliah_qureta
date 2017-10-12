<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolls;

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
}
