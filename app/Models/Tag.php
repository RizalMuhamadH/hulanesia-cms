<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
