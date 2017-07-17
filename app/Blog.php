<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Blog extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'body', 'user_id'];

	/**
	 * One To Many relationship with comment model
	 *
	 */
	public function comments() 
	{
		return $this->hasMany('App\Comment');
	}
	
}
