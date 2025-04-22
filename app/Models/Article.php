<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_banner' => 'boolean',
        "images" => "array",
        "documents" => "array",
    ];

    public function category()
    {
        return $this->belongsTo(CategoryArticle::class, 'category_article_id');
    }
}
