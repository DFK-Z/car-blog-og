<?php

namespace App\Http\Controllers;

use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){


    $categories = CategoryArticle::where("is_active", true)->get();
    return view("website.category.index",[
        "categories" => $categories,
        "title" => "Страница категорий"
    ]);
   }
}
