<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Image extends Model
{
    use HasFactory;
    use Resizable;

    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }
}
