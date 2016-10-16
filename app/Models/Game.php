<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Game extends Model
{
    /*
     * attributes: id, season_id, date, youtubeLink, vsTeam, score, win/loss
     */

    public function getVideoId(){

        $array = preg_split('/embed\//', $this->youtubeLink);

        return $array[1];
    }
}
