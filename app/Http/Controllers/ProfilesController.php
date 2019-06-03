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
        //$this->middleware('auth');
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
    	$this->authorize('update', $user->profile);

		return view('profiles.edit', ['user' => $user]);
	}

	public function update(User $user){
		$this->authorize('update', $user->profile);

		$data = request()->validate([
			'position' => '',
			'about_me' => '',
			'image' => ''
		]);

		if(request('image')){
			$imagePath = request('image')->store('profile', 'public');
		}

		auth()->user()->profile->update(
			array_merge(
				$data,
				['image' => $imagePath]
			)
		);

		return redirect("/profile/{$user->id}");

	}
}
