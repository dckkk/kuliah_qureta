<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teachers;

class HomeController extends Controller
{
    public function index() {
    	$teachers = Teachers::take(5)->get();

    	return view('index', compact('teachers'));
    
    }
}
