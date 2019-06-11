<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Post;

class AdminController extends Controller
{
    public function index(){

	    $users = User::count();

	    $comments = Comment::count();

	    $posts = Post::count();


	    return view('admin.index', compact('users', 'posts', 'comments'));
    }
}
