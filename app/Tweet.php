<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
        /**on peut écrire return $this->morphMany('App\Comment', 'commentable')->latest(); pour que les
        commentaires s'affichent orderBy('desc')*/
    }
}
