<?php

use Illuminate\Database\Seeder;

class AlignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aligns')->insert([
            'value' => 'center',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('aligns')->insert([
            'value' => 'left',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('aligns')->insert([
            'value' => 'right',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('aligns')->insert([
            'value' => 'justify',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
