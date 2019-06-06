<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];
	/**
	 *
	 * get record with user
	 */
	public function category(){
		return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
	}
}
