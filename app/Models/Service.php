<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'description'
    ];

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
