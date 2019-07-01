<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
	public function index(){
		$posts = Cache::remember('home_page_posts', now()->addSeconds(60), function () {
			return Post::orderBy('created_at', 'desc')->paginate(5);
		});

		//работа с файлами
		//Storage::disk('local')->put('public/file.txt', 'Contents');
		//http://laravel.su/docs/5.4/filesystem
		Storage::put('public/file.txt', 'Contents');
		if($exists = Storage::exists('public/file.txt')) {
			$contents = Storage::get( 'public/file.txt' );
			//dd( $contents );

			$url = Storage::url('public/file.txt');
			dd( $url );
		}

    	return view('index', compact('posts'));
    }
}
