<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Goal extends Model
{

    /**
     * Get the season that owns the comment.
     */
    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }


}
