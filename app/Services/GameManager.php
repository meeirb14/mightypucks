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
        $game->youtubeLink = $this->stripYoutubeLink($youtubeLink);
        $game->date = date( 'Y-m-d', strtotime($date) );
        $game->season_id = $season_id;
        $game->vsTeam = $vsTeam;
        $game->winLoss = $winLoss;
        $game->goalsFor = $goalsFor;
        $game->goalsAgainst = $goalsAgainst;
        $game->save();
    }

    private function stripYoutubeLink($youtubeLink){

        return $youtubeLink;
    }


}