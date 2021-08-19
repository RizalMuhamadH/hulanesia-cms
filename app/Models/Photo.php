<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory;
    use SoftDeletes;

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
