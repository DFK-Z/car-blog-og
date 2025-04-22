<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = CategoryArticle::all();

        $posts = [
            [
                'name' => 'Ожидается повышение цен на бензин',
                'small_text' => 'В Волгограукууаваавыаыва',
                'content' => 'Я сосал огромный Чёёрный ',
                'image' => null,
                'is_active' => true,
                'is_featured'=> false,
                'is_banner' => true,
            ],
            [
                'name' => 'Ожидается Новая мета в Дота 2',
                'small_text' => 'В Волгограде Новая мета',
                'content' => 'Я сосал огромный Чёёрный пудж',
                'image' => null,
                'is_active' => true,
                'is_featured'=> false,
                'is_banner' => true,
            ],
            [
                'name' => 'В Дота 2 добавили речку',
                'small_text' => 'НОвый патч принес карасей и головастиков',
                'content' => 'Я сосал огромный Чёёрный пудж',
                'image' => null,
                'is_active' => true,
                'is_featured'=> false,
                'is_banner' => false,
            ],
        ];

        foreach($posts as $post){
            Article::create([
                'category_article_id' => 1,
                'name' => $post['name'],
                'small_text' => $post['small_text'],
                'content' => $post['content'],
                'image' => $post['image'],
                'is_active' => $post['is_active'],
                'is_featured'=> $post['is_featured'],
                'is_banner' => $post['is_banner'],
            ]);
        }
    }
}
