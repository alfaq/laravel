<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}


	//
	public function create(){

		return view('posts.create');
	}

	public function store(){

		$data = request()->validate([
			'title' => 'required',
			'description' => 'required',
			'image' => ['required','image'],
		]);

		$imagePath = request('image')->store('uploads', 'public');

		//\App\Post::create($data);
		auth()->user()->posts()->create([
			'title' => $data['title'],
			'description' => $data['description'],
			'image' => $imagePath,
		]);

		//dd(request()->all());

		return redirect('/profile/'.auth()->user()->id);
	}

	public function show(\App\Post $post){

		//dd($post);

		return view('posts.show', ['post' => $post]);
	}
}
