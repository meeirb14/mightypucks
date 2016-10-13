<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 10/10/2016
 * Time: 11:07 PM
 */

namespace App\Services;

use App\Models\Season;

class SeasonManager
{

    public function getSeasons()
    {
        $seasons = Season::all();
        return $seasons;
    }

    public function getSeasonById($id){

    }

    public function addSeason($name){

        $season = new Season();
        $season->name = $name;
        $season->save();

    }

}