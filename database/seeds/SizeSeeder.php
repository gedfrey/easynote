<?php

use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'value' => 'normal',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('sizes')->insert([
            'value' => 'big',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('sizes')->insert([
            'value' => 'very_big',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
