<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title', 'content'
    ];

    //protected $guarded = []; //ska inte gå att ändra, motsatsen till fillable

    public function users(){
        return $this->belongsTo(User::class);
    }

    // Maija
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($post) {
            $post->comments()->delete();
        });
    }
}
