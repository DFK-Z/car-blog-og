<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
            'name'=> 'den',
            'message' => 'сосал',
            'is_active' => false,
            'is_featured' => false,
            ],
            [
            'name'=> 'rus',
            'message' => 'den sosal',
            'is_active' => true,
            'is_featured' => false,
            ],
            [
            'name'=> 'misha',
            'message' => 'jac j7 top',
            'is_active' => true,
            'is_featured' => false,
            ],
        ];
        foreach($reviews as $review){
            Review::create($review);
        }
    }
}
