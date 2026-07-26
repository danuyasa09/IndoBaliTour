<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = [
        'name',
        'nationality',
        'rating',
        'message',
        'photo',
        'is_approved',
    ];
}
