<?php

use Illuminate\Database\Seeder;
use UsersTableSeeder;
use SeasonsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
    }
}
