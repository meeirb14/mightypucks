<?php

use Illuminate\Database\Seeder;

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
            'firstName' => 'Meir',
            'lastName'  => 'Bensabat',
            'email'     => 'meirb14@gmail.com',
            'password'  => '$2y$10$/78H6J4j3El87erTmUk1ou4PW9I6zhyeuSxWwMhkktnNGT8Ap7AD6',
            'role'      => 'admin'
        ]);
    }
}
