<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
