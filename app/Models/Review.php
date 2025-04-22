<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',

    ];
}
