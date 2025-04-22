<?php

namespace Database\Seeders;

use App\Models\CategoryArticle as Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Закон',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Эксплуатация',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'События',
                'is_active' => false,
                'is_featured' => false,
            ],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
