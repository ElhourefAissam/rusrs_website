<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => "قالات احذاث",
            'article_body' => 'لسلامة الطرقية بالصحراء ش.و.ل.ط خروج مقالات احذاث معرض برامج اعضاء الجمعية المعرض الصور الحدث الاحداث حدث توصيف المكان العنوان الحدث البداية النهاية تعديل الحدث استمارة تعديل الحدث من الى معلومات العضوالاسم الكامل الفايسبوك ة عضو جديد المنصب أعضاء الجمعية إبحث عضو في الجمعية م إضافة حلقة او برنامج جديدة عضو جديد إضافة رابط البرامج في اليوتيوب اسم عن المزيد أ',
            'author' => Str::random(10),
        ]);
    }
}
