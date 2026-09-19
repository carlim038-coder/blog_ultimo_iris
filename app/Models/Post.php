<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Campi che possono essere salvati tramite form
    protected $fillable = [
        'title',
        'content',
        'image',
    ];
}