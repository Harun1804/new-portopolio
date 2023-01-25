<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['url'])->withTimestamps();
    }

    public function scopeSearching($query, $name, $icon)
    {
        $query->when($name, function($q) use($name){
            $q->where('name','like',"%{$name}%");
        })->when($icon, function($q) use($icon){
            $q->where('icon','like',"%{$icon}%");
        });

        return $query;
    }
}
