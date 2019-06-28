<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
	public function index(){
		$posts = Cache::remember('home_page_posts', now()->addSeconds(60), function () {
			return Post::orderBy('created_at', 'desc')->paginate(5);
		});

    	return view('index', compact('posts'));
    }
}
