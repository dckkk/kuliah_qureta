<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Course;
use App\Teachers;
use App\Enrolls;
use App\CourseUser;
use App\User_metum;

class ProfileController extends Controller
{
    public function index($id) {
		$course = Enrolls::with('course')->where('email', Auth::user()->email)->get();
		
		$user = User::select('name')->where('id', $id)->get();

		$profession = User_metum::select('meta_value')->where('meta_name', 'profesi')->where('user_id', $id)->get();
		
		return view('profile', compact('course', 'user', 'profession'));
    }
}
