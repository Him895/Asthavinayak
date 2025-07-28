<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{   protected $fillable = [
    'name',
    'email',
    'subject',
    'message',
    'is_read', // Add this line to include the is_read field
];
    use HasFactory;
}
