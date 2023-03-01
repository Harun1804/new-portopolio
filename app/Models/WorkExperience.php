<?php

namespace App\Models;

use App\Models\WorkExperienceDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        'year_from',
        'year_to',
        'city',
        'nation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(WorkExperienceDetail::class);
    }

    public function scopeSearching($query, $payload)
    {
        $query->when($payload['position'], function($que) use($payload){
            $que->where('position','like',"%{$payload['position']}%");
        });
        $query->when($payload['year_from'], function($que) use($payload){
            $que->where('year_from','like',"%{$payload['year_from']}%");
        });
        $query->when($payload['year_to'], function($que) use($payload){
            $que->where('year_to','like',"%{$payload['year_to']}%");
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
