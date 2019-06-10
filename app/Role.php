<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $guarded = [];
	/**
	 *
	 * get record with user
	 */
	public function users(){
		return $this->hasMany(User::class);
	}
}
