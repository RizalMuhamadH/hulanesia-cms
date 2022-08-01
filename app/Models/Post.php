<?php

namespace App\Models;

use App\Enums\PostStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

// use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
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

    protected $casts = [
        'status' => PostStatus::class
    ];

    protected $dates = ['published_at'];

    public function url(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => env('WEBSITE_URL') . '/' . $this->category->slug . '/' . $attributes['id'] . '/' . Carbon::parse($attributes['published_at'])->format('dmY') . '/' . $attributes['slug'],
        );
    }

    public function imagePath(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => env('STORAGE') . $this->image->path,
        );
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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

    public function related()
    {
        return $this->morphToMany(static::class, 'relatable')->withTimestamps();
    }

    public function parents()
    {
        return $this->morphedByMany(static::class, 'relatable');
    }

    public function routeNotificationForOneSignal()
    {
        return ['included_segments' => ['Subscribed Users']];
    }
}
