<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Game extends Model
{
    /*
     * attributes: id, season_id, date, youtubeLink, vsTeam, score, win/loss
     */

    public function getVideoId(){

        $array = preg_split('/v=/', $this->youtubeLink);

        return $array[1];
    }

    /**
     * Get the season that owns the comment.
     */
    public function season()
    {
        return $this->belongsTo('App\Models\Season');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }


}
