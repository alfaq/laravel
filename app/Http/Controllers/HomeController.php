<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
	public function index(){
		$minutes = 10;
		$posts = Cache::remember('home_page_posts', $minutes, function () {
			return Post::orderBy('created_at', 'desc')->paginate(5);
		});

    	return view('index', compact('posts'));
    }
}
