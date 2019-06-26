<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostsController extends Controller
{

	public function create(){
		$categories = Category::orderBy('title', 'asc')->get();

		return view('posts.create', compact('categories'));
	}

	public function store(){

		$data = request()->validate([
			'title' => 'required',
			'description' => 'required',
			'category' => 'required',
			'image' => ['required','image'],
		]);

		$imagePath = request('image')->store('uploads', 'public');

		//\App\Post::create($data);
		auth()->user()->posts()->create([
			'title' => $data['title'],
			'description' => $data['description'],
			'category_id' => $data['category'],
			'image' => $imagePath,
		]);

		//dd(request()->all());

		return redirect('/profile/'.auth()->user()->id);
	}

	public function show(Post $post){

		//dd($post);
		event('postHasViewed', $post);

		return view('posts.show', ['post' => $post]);
	}
}
