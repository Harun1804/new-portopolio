<?php

namespace App\Models;

use App\Models\Portopolio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortopolioSlideshow extends Model
{
    use HasFactory;

    protected $fillable = [
        'portopolio_id',
        'image'
    ];

    public function portopolio()
    {
        return $this->belongsTo(Portopolio::class);
    }

    public function image():Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/img/slider/'.$value)
        );
    }

    public function scopeGetByPortopolio($query, $portopolio_id)
    {
        return $query->wherePortopolioId($portopolio_id);
    }
}
