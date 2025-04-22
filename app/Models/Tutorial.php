<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $table = "tutorials";
    protected $guarded = [];

    protected $casts = [
        "is_active" => "boolean",
        "is_popular" => "boolean",
        "is_new" => "boolean",
        "images" => "array",
        "stages" => "array",
        "meta_keywords" => "array",
    ];
}
