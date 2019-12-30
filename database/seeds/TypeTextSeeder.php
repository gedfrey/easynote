<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type__texts')->insert([
            'name' => 'title',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('type__texts')->insert([
           'name' => 'body_text',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
