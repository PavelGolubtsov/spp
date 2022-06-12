<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = [
            ['name' => 'высокий'],
            ['name' => 'средний'],
            ['name' => 'низкий'],
        ];

        foreach($priorities as $priority){
            Priority::create($priority);
        }
    }
}