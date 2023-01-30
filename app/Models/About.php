<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'site',
        'phone',
        'city',
        'nation',
        'freelance_status',
        'description',
        'profile',
        'hero'
    ];

    protected function profile():Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/img/profile/'.$value),
        );
    }

    public function hero():Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/img/hero/'.$value),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
