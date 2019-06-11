<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function users(){          
        return $this->belongsTo(User::class);
      }

    public function posts(){
        return $this->belongsTo(Post::class);
      }
}
