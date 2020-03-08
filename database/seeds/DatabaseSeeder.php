<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('TypeTextSeeder');
        $this->call('AdminSeeder');
        $this->call('ColorSeeder');
        $this->call('AlignSeeder');
        $this->call('SizeSeeder');
    }
}
