<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Tambahkan baris ini:
    protected $casts = [
        'pendidikan' => 'array',
        'pengalaman' => 'array',
    ];
}