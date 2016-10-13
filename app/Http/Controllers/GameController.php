<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SeasonManager;
use App\Services\GameManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GameController extends Controller
{
    private $gameMngr;

    public function __construct(){
        $this->gameMngr = new GameManager();
    }

    public function show($id)
    {
        $game = $this->gameMngr->getGameById($id);
        $data = array(
            'game' => $game
        );

        return view('gameView', $data);
    }


}