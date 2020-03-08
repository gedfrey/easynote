<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'value' => 'red',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('colors')->insert([
            'value' => 'black',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('colors')->insert([
            'value' => 'blue',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
