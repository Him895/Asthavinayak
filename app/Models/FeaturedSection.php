<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedSection extends Model
{
    protected $fillable = [
        'left_image',
        'icon_image',
        'heading',
        'subheading',
        'accordions',
        'info_table',
    ];

    use HasFactory;
}
