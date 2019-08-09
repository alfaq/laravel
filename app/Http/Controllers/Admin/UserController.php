<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		if(!empty($role_id = $request->query('role_id'))){
			$users = User::where('role_id', $role_id)->orderBy('created_at', 'desc')->paginate(20);
		}
		elseif(!empty($name = $request->query('name'))){
			$users = User::where('name', 'like', '%'.$name.'%')->orderBy('created_at', 'desc')->paginate(20);
		}
		else {
			$users = User::orderBy( 'created_at', 'desc' )->paginate( 20 );
		}

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$roles = Role::get();
		return view('admin.users.create', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'confirmed'],
		]);

		User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);

		//dd(request()->all());

		return redirect('/dashboard/users/');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		$roles = Role::get();
		return view('admin.users.edit', compact('roles', 'user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		$data = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
		]);

		$user->update($data);

		return redirect('/dashboard/users/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		$user->delete();
		return redirect('/dashboard/users');
	}
}
