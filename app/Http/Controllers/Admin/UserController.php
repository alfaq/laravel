<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Post;

class UserController extends Controller
{
    public function index(){

	    $users = User::orderBy('id', 'desc')->get();

	    return view('admin.users.show', compact('users'));
    }
}
