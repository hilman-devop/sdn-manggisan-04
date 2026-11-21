<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'vision',
        'mission',
        'history',
        'facilities',
        'achievements',
        'image'
    ];

    protected $casts = [
        'facilities' => 'array',
        'achievements' => 'array'
    ];
} 