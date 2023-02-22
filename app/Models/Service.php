<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearching($query, $name, $icon)
    {
        $query->when($name, function($q) use ($name){
            $q->where('name','like', "%{$name}%");
        });
        $query->when($icon, function($q) use ($icon){
            $q->where('icon','like', "%{$icon}%");
        });

        return $query;
    }
}
