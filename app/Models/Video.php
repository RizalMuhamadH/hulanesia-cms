<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'vid',
        'slug',
        'description',
        'slug',
        'thumbnail',
        'duration',
        'status',
    ];

    protected $dates = ['created_at'];
}
