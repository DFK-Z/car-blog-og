<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'Никита Андреевич',
                'email' => 'guga2005av@mail.ru',
                'telegram' => '@sigmaman',
                'message' => 'Пожалуйста, позвони мне, молодой чел',
                'status' => 'cancel'
            ],
            [
                'name' => 'Ворко Андрей',
                'email' => 'andrey200gruz@mail.ru',
                'telegram' => '@sigmaman',
                'message' => null,
                'status' => 'completed'
            ],
            [
                'name' => 'Дристун',
                'email' => 'duz200gruz@mail.ru',
                'telegram' => '@sigmaman',
                'message' => null,
                'status' => 'completed'
            ],
        ];
        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
