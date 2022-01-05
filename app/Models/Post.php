<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use Searchable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'source',
        'source_link',
        'feature_id',
        'category_id',
        'admin_id',
        'author_id',
        'status',
        'meta_description',
        'meta_keywords',
        'seo_title',
        'published_at'
    ];

    protected $dates = ['published_at'];
    

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function author()
    {
        return $this->belongsTo(Netizen::class, 'author_id');
    }

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
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    public function bodylinks()
    {
        return $this->morphMany(Bodylink::class, 'bodylinkable');
    }
}
