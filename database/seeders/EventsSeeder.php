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
            'title' => "إضافة حلقة او برنامج جديدة",
            'description' => 'داية النهاية تعديل الحدث استمارة تعديل الحدث من الى معلومات العضوالاسم الكامل الفايسبوك ة عضو جديد المنصب أعضاء الجمعية إبحث عضو في الجمعية م إضافة حلقة او برنامج جديدة عضو جديد إضافة ',
            'place' => Str::random(30),
            'address' => Str::random(30),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
        ]);
    }
}
