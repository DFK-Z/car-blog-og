<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles::index',[
            "title" => 'Статьи и новости'
        ]);
    }
    public function CategoryPost($id)
    {
        $articles = Article::where('is_active', true)->where('category_article_id', $id)->get();
        return view('website.category.show-category', [
        "articles" => $articles,

        "title" => "Страница статей"

        ]);
    }
     public function show($id){

         $article = Article::findOrFail($id);
        $recomendations = Article::whereHas("category",function($query){
            $query->where("is_active", true);
        })
        ->where("is_active",  true)
        ->where("is_featured", true)
        ->where("id", "!=", $article->id)
        ->inRandomOrder()
        ->limit(6)
        ->get();
        return view("articles::show",[
            "title" => $article->name,
            "article" => $article,
            "recomendations" => $recomendations


        ]);
     }
}
