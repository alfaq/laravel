<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
	public function __construct()
	{
		$this->middleware('is_admin');
	}

    public function index(){
	    $categories = Category::orderBy('title', 'asc')->paginate(10);

	    return view('admin.categories.index', compact('categories'));
    }

	public function create(){
		return view('admin.categories.create');
	}

	public function store(){
		$data = request()->validate([
			'title' => 'required'
		]);

		Category::create($data);

		return redirect('/dashboard/categories');
	}

	public function edit(Category $category){
		return view('admin.categories.edit', ['category' => $category]);
	}

	public function update(Category $category){
		$data = request()->validate([
			'title' => 'required'
		]);

		$category->update($data);

		return redirect('/dashboard/categories');
	}

	public function destroy(Category $category){
		$category->delete();
		return redirect('/dashboard/categories');
	}
}
