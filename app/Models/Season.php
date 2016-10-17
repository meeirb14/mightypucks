<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Season extends Model
{
/*
 * attributes: id, name
 */


    /**
     * Get the games for the blog post.
     */
    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

}
