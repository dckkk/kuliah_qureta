<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Course;
use App\Enrolls;

class ProfileController extends Controller
{
    public function index($id) {
		$course = Enrolls::with('course')->where('email', Auth::user()->email)->get();
		
		$user = User::select('name', 'profession', 'image_url')->where('id', $id)->get();
		
		return view('profile', compact('course', 'user'));
    }
}
