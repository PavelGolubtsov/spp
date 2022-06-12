<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = [
            ['name' => 'обучение'],
            ['name' => 'тестирование'],
            ['name' => 'php'],
            ['name' => 'js'],
        ];

        foreach($priorities as $status){
            Tag::create($status);
        }
    }
}
