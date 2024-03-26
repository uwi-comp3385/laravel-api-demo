<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'status',
        'tickets_available',
        'price',
        'registration_starts_at',
        'registration_ends_at',
        'starts_at',
        'ends_at',
    ];
}
