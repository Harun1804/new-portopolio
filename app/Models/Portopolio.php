<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portopolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'url',
        'client',
        'thumbnail'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function thumbnail():Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/img/thumbnail/'.$value)
        );
    }

    public function scopeSearching($query, $name)
    {
        $query->when($name, function($q) use($name){
            $q->where('name','like',"%{$name}%");
        });

        return $query;
    }

    public function scopeGetByUser($query, $userId)
    {
        return $query->whereUserId($userId);
    }
}
