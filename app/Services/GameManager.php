<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 10/10/2016
 * Time: 11:07 PM
 */

namespace App\Services;

use App\Models\Game;
use App\Models\Goal;
use Illuminate\Http\Request;

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


    public function addGame(Request $request){

        $gameObject = json_decode(json_encode($request->all()), FALSE);
        //$json = json_encode($request->all());

        //dd($gameObject);
        
        $game = new Game();
        $game->youtubeLink = $this->fixToYoutubeLink($gameObject->game->youtubeLink);
        $game->date = date( 'Y-m-d', strtotime($gameObject->game->date) );
        $game->season_id = $gameObject->game->season_id;
        $game->vsTeam = $gameObject->game->vsTeam;
        $game->winLoss = $gameObject->game->winLoss;
        $game->goalsFor = $gameObject->game->goalsFor;
        $game->goalsAgainst = $gameObject->game->goalsAgainst;

        $game->save();

        $teamGoalTimes = $gameObject->game->teamGoalTimes;
        $vsTeamGoalTimes = $gameObject->game->vsTeamGoalTimes;

        foreach($teamGoalTimes as $goalTime){

            $goal = new Goal();
            $goal->team = "Mighty Pucks";
            $goal->time = $goalTime;

            $game->goals()->save($goal);
        }

        foreach($vsTeamGoalTimes as $vsGoalTime){

            $goal = new Goal();
            $goal->team = $game->vsTeam;
            $goal->time = $vsGoalTime;

            $game->goals()->save($goal);
        }

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