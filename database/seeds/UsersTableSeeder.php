<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Mahmoud',
            'last_name' => 'Khalil',
            'email' => 'mkhlil1288@gmail.com',
            'password' => bcrypt('00007121988'),
            'activated' => '1',
            'city' => '1',
            'type' => '1',
            'address' => 'asd st.',
            'phone' => '201151158715',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
