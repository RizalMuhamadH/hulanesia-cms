<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'source',
        'source_link',
        'feature_id',
        'category_id',
        'user_id',
        'status',
        'meta_description',
        'meta_keywords',
        'seo_title',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function video()
    {
        return $this->morphOne(Video::class, 'videoable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function bodylinks()
    {
        return $this->morphMany(Bodylink::class, 'bodylinkable');
    }
}
