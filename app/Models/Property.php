<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
     protected $table = 'properteys';
    protected $fillable = [
    'heading',
    'subheading',
    'type',
    'image',
    'price',
    'address',
    'details',
    'specification', // Add the specification field
];

     protected $casts = [
        'details' => 'array',
     ];
    use HasFactory;
}
