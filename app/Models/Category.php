<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'description',
        'parent_id',
        'order'
    ];

    protected $dates = ['created_at'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
