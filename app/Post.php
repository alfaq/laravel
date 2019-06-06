<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $guarded = [];
	/**
	 *
	 * get record with user
	 */
	public function user() {
		return $this->belongsTo(User::class);//https://laravel.ru/docs/v5/eloquent-relationships
	}

	public function comments(){
		return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
	}

	public function category(){
		return $this->belongsTo(Category::class);//https://laravel.ru/docs/v5/eloquent-relationships
	}
}
