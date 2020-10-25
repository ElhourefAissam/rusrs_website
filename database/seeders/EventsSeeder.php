<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventsSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            'title' => Str::random(20),
            'description' => Str::random(50),
            'place' => Str::random(30),
            'adress' => Str::random(30),
            'start_date' => Str::random(30),
            'end_date' => Str::random(30),
        ]);
    }
}
