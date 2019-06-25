<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
	public function index(){
	    $posts = Post::orderBy('created_at', 'desc')->paginate(5);

    	return view('index', compact('posts'));
    }
}
