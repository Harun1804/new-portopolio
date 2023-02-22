<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'level',
        'major',
        'year_in',
        'year_out',
        'university',
        'city',
        'nation',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearching($query, $payload)
    {
        $query->when($payload['level'], function($que) use($payload){
            $que->where('level','like',"%{$payload['level']}%");
        });
        $query->when($payload['major'], function($que) use($payload){
            $que->where('major','like',"%{$payload['major']}%");
        });
        $query->when($payload['year_in'], function($que) use($payload){
            $que->where('year_in','like',"%{$payload['year_in']}%");
        });
        $query->when($payload['year_out'], function($que) use($payload){
            $que->where('year_out','like',"%{$payload['year_out']}%");
        });
        $query->when($payload['university'], function($que) use($payload){
            $que->where('university','like',"%{$payload['university']}%");
        });
        $query->when($payload['city'], function($que) use($payload){
            $que->where('city','like',"%{$payload['city']}%");
        });
        $query->when($payload['nation'], function($que) use($payload){
            $que->where('nation','like',"%{$payload['nation']}%");
        });

        return $query;
    }

    public function scopeGetByUser($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
