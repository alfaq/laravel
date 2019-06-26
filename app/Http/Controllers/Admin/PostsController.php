<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\User;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('is_admin');
	}

    public function index(){
	    $posts = Post::orderBy('created_at', 'desc')->paginate(10);

	    return view('admin.posts.index', compact('posts'));
    }

	public function create(){
		$categories = Category::orderBy('title', 'asc')->get();
		$users = User::orderBy('name', 'asc')->get();
		return view('admin.posts.create', compact('categories', 'users'));
	}

	public function store(){
		$data = request()->validate([
			'title' => 'required',
			'description' => 'required',
			'category' => 'required',
			'image' => ['required','image'],
			'user' => 'required',
		]);

		$imagePath = request('image')->store('uploads', 'public');

		//\App\Post::create($data);
		Post::create([
			'title' => $data['title'],
			'description' => $data['description'],
			'category_id' => $data['category'],
			'user_id' => $data['user'],
			'image' => $imagePath,
		]);

		return redirect('/dashboard/posts');
	}

	public function edit(Post $post){
		$categories = Category::orderBy('title', 'asc')->get();
		return view('admin.posts.edit', compact('post', 'categories'));
	}

	public function update(Post $post){
		$data = request()->validate([
			'title' => 'required',
			'description' => 'required',
			'category' => 'required',
			//'image' => ['required','image'],//TODO
		]);

		$d = [
			'title' => $data['title'],
			'description' => $data['description'],
			'category_id' => $data['category'],
		];

		if(request('image')) {
			$imagePath = request( 'image' )->store( 'uploads', 'public' );
			$d['image'] = $imagePath;
		}
		$post->update($d);

		return redirect('/dashboard/posts');
	}

	public function destroy(Post $post){
		//dd($post);
		$post->delete();
		return redirect('/dashboard/posts');
	}
}
