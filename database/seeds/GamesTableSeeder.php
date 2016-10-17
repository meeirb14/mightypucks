<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('games')->insert([
            'youtubeLink'   => 'https://www.youtube.com/watch?v=_I87Mf52xJI',
            'date'          => '8/10/2016',
            'vsTeam'        => 'Ruthless',
            'winLoss'       => 'L',
            'goalsFor'      => '3',
            'goalsAgainst'  => '4',
            'season_id'     => '1',

        ]);


    }
}
