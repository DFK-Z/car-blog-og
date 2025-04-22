<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    protected $table = 'category_articles';

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_article_id');
    }
}
