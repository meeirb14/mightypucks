<?php

use Illuminate\Database\Seeder;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('goals')->insert([
            'game_id' => '1',
            'team' => 'Mighty Pucks',
            'time' => '4:30'
        ]);

        DB::table('goals')->insert([
            'game_id' => '1',
            'team' => 'Ruthless',
            'time' => '20:00'
        ]);

        DB::table('goals')->insert([
            'game_id' => '1',
            'team' => 'Ruthless',
            'time' => '20:55'
        ]);

        DB::table('goals')->insert([
            'game_id' => '1',
            'team' => 'Ruthless',
            'time' => '23:41'
        ]);

        DB::table('goals')->insert([
            'game_id' => '1',
            'team' => 'Mighty Pucks',
            'time' => '34:18'
        ]);

        DB::table('goals')->insert([
            'game_id' => '1',
            'team' => 'Mighty Pucks',
            'time' => '40:38'
        ]);

        DB::table('goals')->insert([
            'game_id' => '1',
            'team' => 'Ruthless',
            'time' => '47:47'
        ]);
    }
}
