<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearching($query, $name)
    {
        $query->when($name, function($q) use($name){
            $q->where('name','like',"%{$name}%");
        });

        return $query;
    }
}
