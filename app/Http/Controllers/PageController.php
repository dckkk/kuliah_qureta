<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pages;

class PageController extends Controller
{

    public function index($slug) {
    	$page = Pages::where('slug', $slug)->get();

    	return view('page', compact('page'));
    }

}
