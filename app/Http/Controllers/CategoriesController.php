<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use App\Category;

class CategoriesController extends Controller
{
    public function show($category){

	    $categories = Category::orderBy('title', 'asc')->get();

	    $users = User::orderBy('created_at', 'desc')->take(5)->get();

	    $comments = Comment::orderBy('created_at', 'desc')->take(5)->get();

	    $posts = Post::where('category_id', $category)->orderBy('created_at', 'desc')->paginate(5);

	    return view('categories.show', compact('categories', 'users', 'comments', 'posts'));
    }
}
