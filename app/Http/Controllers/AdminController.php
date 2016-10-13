<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SeasonManager;

class AdminController extends Controller
{
    private $seasonMngr;

    public function __construct(){
        $this->seasonMngr = new SeasonManager();
    }

    public function show()
    {
        $seasons = $this->seasonMngr->getSeasons();
        $data = array(
            'seasons' => $seasons
        );

        return view('admin', $data);
    }
}