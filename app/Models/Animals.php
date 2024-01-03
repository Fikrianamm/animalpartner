<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    function user(){
        return $this->belongsTo(User::class);
    }

    function reminders(){
        return $this->hasMany(Reminders::class);
    }

    function health_records(){
        return $this->hasMany(Health_records::class);
    }
}
