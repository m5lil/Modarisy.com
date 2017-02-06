<?php

use Illuminate\Database\Seeder;

class SettingsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['set_slug' => 'إسم الموقع',
            'set_name' => 'site_name',
            'value' => str_random(10),
            'type' => 1,],
            ['set_slug' => 'صفحة تويتر',
            'set_name' => 'twitter',
            'value' => str_random(10),
            'type' => 1,],
            ['set_slug' => 'صفحة الفيس بوك',
            'set_name' => 'facebook',
            'value' => str_random(10),
            'type' => 1,],
            ['set_slug' => 'الكلمات المفتاحة',
            'set_name' => 'site_keywords',
            'value' => 'كلمة, كلمتين, تلات كلمات',
            'type' => 3,],
            ['set_slug' => 'وصف الميتا تاج',
            'set_name' => 'site_meta_description',
            'value' => 'الوصف الذى سوف يظهر فى محركات البحث إسفل إسم الموقع',
            'type' => 2,],
        ]);
    }
}
