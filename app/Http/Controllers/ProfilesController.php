<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
    	$user = User::findOrFail($user);
        return view('profiles.index', ['user' => $user]);
    }

	public function edit(User $user){
		return view('profiles.edit', ['user' => $user]);
	}

	public function update(User $user){

		$data = request()->validate([
			'position' => '',
			'about_me' => '',
			'image' => ''
		]);

		auth()->user()->profile->update($data);

		return redirect("/profile/{$user->id}");

	}
}
