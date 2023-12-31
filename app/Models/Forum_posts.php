<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum_posts extends Model
{
    use HasFactory;
        
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $with = ['user','comments'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search']??false,function($query, $search){
            return $query->where(fn($query)=>
                $query->where('title','like', '%' . $search . '%')
                      ->orWhere('body','like', '%' . $search . '%')
        );
        })->when($filters['category']??false,function($query, $category){
            return $query->whereHas('categories',function($query) use($category){
                $query->where('name', $category);
            });
        });
    }

    public function generateSlug()
    {
        return Str::slug($this->title);
    }

    function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    function categories(){
        return $this->belongsTo(Categories::class, 'categories_id');
    }

    function comments(){
        return $this->hasMany(Comments::class, 'forum_post_id');
    }
}
