<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health_records extends Model
{
    use HasFactory;

    function animals(){
        return $this->belongsTo(Animals::class);
    }
}
