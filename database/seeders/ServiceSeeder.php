<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Название услуги 1',
                'description' => 'Краткое описание услуги 1',
                'content' => 'Контент услуги 1',
                'is_active' => true,
            ],
            [
                'title' => 'Название услуги 2',
                'description' => 'Краткое описание услуги 2',
                'content' => 'Контент услуги 2',
                'is_active' => true,
            ],
            [
                'title' => 'Название услуги 3',
                'description' => 'Краткое описание услуги 3',
                'content' => 'Контент услуги 3',
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
