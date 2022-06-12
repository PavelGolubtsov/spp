<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = [
            ['name' => 'в работе'],
            ['name' => 'завершена'],
        ];

        foreach($priorities as $status){
            Status::create($status);
        }
    }
}
