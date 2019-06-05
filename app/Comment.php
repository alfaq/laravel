<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $guarded = [];

	public function user() {
		return $this->belongsTo(User::class);//https://laravel.ru/docs/v5/eloquent-relationships
	}

	public function post() {
		return $this->belongsTo(Post::class);//https://laravel.ru/docs/v5/eloquent-relationships
	}
}
