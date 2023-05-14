<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedImages extends Model
{
    protected $table = 'rice_seed_images';

    use HasFactory;

    protected $fillable = [
        'image'
    ];
}
