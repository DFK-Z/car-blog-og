<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Collection extends Component
{
    public function getArticlesProperty(){
return Article::whereHas("category", function($query) {
    $query->where("is_active", true);
})->where("is_active", true)->orderByDesc("created_at")->get();

    }
    public function render()
    {
        return view('livewire.article.collection',  ["articles" => $this->getArticlesProperty()]);
    }
}
