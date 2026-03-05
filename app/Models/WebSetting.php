<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Tambahkan block casts ini:
    protected $casts = [
        'hero_slideshow' => 'array',
    ];
}