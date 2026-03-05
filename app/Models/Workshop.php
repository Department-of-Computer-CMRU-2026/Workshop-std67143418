<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'title',
        'speaker',
        'description',
        'location',
        'capacity',
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
