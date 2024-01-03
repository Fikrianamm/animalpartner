<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $with = ['user'];

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

    function categories(){
        return $this->belongsTo(Categories::class);
    } 

    function user(){
        return $this->belongsTo(User::class);
    } 
}
