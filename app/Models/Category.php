<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function scopeSearching($query, $name)
    {
        $query->when($name, function($q) use($name){
            $q->where('name','like',"%{$name}%");
        });

        return $query;
    }
}
