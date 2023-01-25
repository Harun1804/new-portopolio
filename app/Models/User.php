<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Job;
use App\Models\About;
use App\Models\SocialMedia;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'slug'
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
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class)->withTimestamps();
    }

    public function sosmeds()
    {
        return $this->belongsToMany(SocialMedia::class)->withPivot(['url'])->withTimestamps();
    }

    public function about()
    {
        return $this->hasOne(About::class);
    }

    public function scopeSearching($query, $name, $email)
    {
        $query->when($name, function($q) use($name){
            $q->where('name','like',"%{$name}%");
        })->when($email, function($q) use($email){
            $q->where('email','like',"%{$email}%");
        });

        return $query;
    }

    public function scopeUserOnly($query)
    {
        return $query->whereRole('user');
    }
}
