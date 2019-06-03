<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $guarded = [];
	/**
	 *
	 * get record with user
	 */
    public function user() {

    	return $this->belongsTo(User::class);//https://laravel.ru/docs/v5/eloquent-relationships
    }
}
