<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestDeal extends Model
{
    Protected $fillable = [
        'type',
    'heading',
    'subheading',
    'image',
    'description',
    'details',

    ];

    protected $casts = [
        'details' => 'array',
    ];
    use HasFactory;
}
