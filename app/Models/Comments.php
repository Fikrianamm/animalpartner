<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    function forum_posts(){
        return $this->belongsTo(Forum_posts::class,'forum_post_id');
    }
}
