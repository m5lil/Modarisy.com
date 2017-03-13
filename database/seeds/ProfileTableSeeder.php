<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'gen_exp' => '3',
            'sch_exp' => '2',
            'teach_time' => '2',
            'teach_hours' => '2',
            'hour_rate' => '20',
            'intro' => 'Bla Bla Bla',
            'gender' => '1',
            'school' => '1',
            'user_id' => '1',
            'dbirth' => Carbon::now()->format('Y-m-d'),
            'age' => '20',
            'hear' => 'Bla Bla Bla',
            'lang' => 'ar',
            'level' => '1',
        ]);
    }
}
