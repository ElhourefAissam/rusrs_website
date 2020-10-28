<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventsSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            'title' => Str::random(20),
            'description' => 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!',
            'place' => Str::random(30),
            'address' => Str::random(30),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
        ]);
    }
}
