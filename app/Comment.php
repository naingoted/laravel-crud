<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'comment',
    ];

    /**
     * Many to One relationship with Blog
     * 
     */
    public function blog()
    {
    	return $this->belongsTo('App\Blog');
    }
}
