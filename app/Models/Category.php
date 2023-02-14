<?php

namespace App\Models;

use App\Models\Portopolio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function portopolios()
    {
        return $this->hasMany(Portopolio::class);
    }

    public function scopeSearching($query, $name)
    {
        $query->when($name, function($q) use($name){
            $q->where('name','like',"%{$name}%");
        });

        return $query;
    }
}
