<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_datetime',
        'venue',
        'section',
        'row',
        'seat',
        'ticket_type',
        'ticket_link',
    ];

    protected $casts = [
    'event_datetime' => 'datetime',
    ];
}
