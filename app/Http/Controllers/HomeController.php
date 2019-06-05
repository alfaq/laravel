<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;

class HomeController extends Controller
{
	public function index(){

    	//todo
    	$categories = [];

	    $users = User::orderBy('id', 'desc')->take(5)->get();

	    $comments = Comment::orderBy('id', 'desc')->take(5)->get();

	    $posts = Post::orderBy('id', 'desc')->take(10)->get();

    	return view('index', compact('categories', 'users', 'comments', 'posts'));
    }
}
