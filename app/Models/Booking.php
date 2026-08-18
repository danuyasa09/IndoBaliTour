<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'item_title',
        'full_name',
        'email',
        'phone',
        'booking_date',
        'total_person',
        'details',
        'status',
    ];

    protected $casts = [
        'details' => 'array',
        'booking_date' => 'date',
    ];
}
