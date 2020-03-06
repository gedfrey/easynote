<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::create([
//            'name' => 'Admin',
//            'email' => 'daniel.alvarezl@usach.cl',
//            'email_verified_at' => now(),
//            'password' => bcrypt(env('BLOG_PASS')),
//            'admin' => 1,
//            'approved_at' => now(),
//        ]);
        DB::table('users')->insert([
//            'name' => 'title',
//            'created_at' => date("Y-m-d H:i:s")
            'name' => 'Admin',
            'email' => 'daniel.alvarezl@usach.cl',
            'email_verified_at' => now(),
            'password' => bcrypt(env('BLOG_PASS')),
            'admin' => 1,
            'approved_at' => now(),
        ]);
    }
}
