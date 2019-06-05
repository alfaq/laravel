<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class HomeController extends Controller
{
	public function index(){

    	//todo
    	$categories = [];

	    $users = User::orderBy('id', 'desc')->take(5)->get();

	    $comments = [];

	    $posts = Post::orderBy('id', 'desc')->take(10)->get();

    	return view('index', compact('categories', 'users', 'comments', 'posts'));
    }
}
