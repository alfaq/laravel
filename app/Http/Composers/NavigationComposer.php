<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\User;
use App\Comment;
use App\Category;

class NavigationComposer
{
	public function compose(View $view)
	{
		$categories = Category::orderBy('title', 'asc')->get();

		$users = User::orderBy('created_at', 'desc')->take(5)->get();

		$comments = Comment::orderBy('created_at', 'desc')->take(5)->get();

		$view->with(['categories' => $categories, 'users' => $users, 'comments' => $comments]);
	}
}