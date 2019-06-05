<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function store(){
	    $data = request()->validate([
		    'description' => 'required',
		    'post_id' => 'required|numeric'
	    ]);

	    auth()->user()->comments()->create([
		    'description' => $data['description'],
		    'post_id' => $data['post_id'],
	    ]);

	    return redirect('/post/'.$data['post_id']);
    }
}
