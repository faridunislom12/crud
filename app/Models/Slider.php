<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'short_desc', 'description', 'image', 'is_active'];

    protected $casts = [
        'image'=> 'array',
    ];
}
