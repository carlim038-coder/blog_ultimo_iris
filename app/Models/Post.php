<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Aggiungi questa riga per autorizzare i campi del form
    protected $fillable = ['title', 'content'];
}