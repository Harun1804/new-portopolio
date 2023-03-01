<?php

namespace App\Models;

use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperienceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_experience_id',
        'activity'
    ];

    public function workExperience()
    {
        return $this->belongsTo(WorkExperience::class);
    }

    public function scope($query, $payload)
    {
        $query->when($payload['activity'], function($que) use($payload){
            $que->where('activity','like',"%{$payload['activity']}%");
        });

        return $query;
    }
}
