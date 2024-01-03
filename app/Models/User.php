<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search']??false,function($query, $search){
            return $query->where(fn($query)=>
                $query->where('name','like', '%' . $search . '%')
        );
        });
    }

    function forum_posts(){
        return $this->hasMany(Forum_posts::class);
    }

    function comments(){
        return $this->hasMany(Comments::class);
    }

    function animals(){
        return $this->hasMany(Animals::class);
    }

    function reminders(){
        return $this->hasMany(Reminders::class);
    }

    function articles(){
        return $this->hasMany(Articles::class);
    }

    public function doctor_profil()
    {
        return $this->hasOne(Doctor_profil::class);
    }
}
