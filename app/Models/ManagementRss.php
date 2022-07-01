<?php

namespace App\Models;

use App\Enums\FeedEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementRss extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'category_id',
        'size',
        'status',
        'utm',
        'format'
    ];

    protected $casts = [
        'type' => FeedEnum::class
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
