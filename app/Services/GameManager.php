<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 10/10/2016
 * Time: 11:07 PM
 */

namespace App\Services;

use App\Models\Game;

class GameManager
{

    public function getGames()
    {
        $games = Game::all();
        return $games;
    }

    public function getGameById($id){

        $game = Game::find($id);
        return $game;
    }


    public function addGame($youtubeLink, $date, $season_id, $vsTeam, $winLoss,
                                $goalsFor, $goalsAgainst){

        $game = new Game();
        $game->youtubeLink = $this->fixToYoutubeLink($youtubeLink);
        $game->date = date( 'Y-m-d', strtotime($date) );
        $game->season_id = $season_id;
        $game->vsTeam = $vsTeam;
        $game->winLoss = $winLoss;
        $game->goalsFor = $goalsFor;
        $game->goalsAgainst = $goalsAgainst;
        $game->save();
    }
/*
 * <iframe width="640" height="360" src="https://www.youtube.com/embed/JM3ZId63tM0" frameborder="0" allowfullscreen></iframe>
 */
    private function fixToYoutubeLink($youtubeLink){

        $array = preg_split('/=/', $youtubeLink);

        $newLink = "https://www.youtube.com/embed/" . $array[1];

        return $newLink;
    }


}