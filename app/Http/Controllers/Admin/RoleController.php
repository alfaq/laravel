<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    public function index(){

	    $roles = Role::orderBy('id', 'desc')->paginate(10);

	    return view('admin.roles.index', compact('roles'));
    }
}
