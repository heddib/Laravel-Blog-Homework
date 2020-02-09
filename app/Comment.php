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
        'content',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the post that owns the post.
     */
    public function post() {
        return $this->belongsTo('App\Post');
    }

    protected $table = "comments";
}
