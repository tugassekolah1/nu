<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'title', 'category', 'event_date', 'event_time', 'location', 'description',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}