<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function users(){          // ok att denna är samma som på Post.php?
        return $this->belongsTo(User::class);
      }
}
