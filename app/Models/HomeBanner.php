<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $fillable = [
        'location',
        'country',
        'title_line1',
        'title_line2',
        'background_image',
    ];
    use HasFactory;
}
