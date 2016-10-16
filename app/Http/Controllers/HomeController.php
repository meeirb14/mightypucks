<?php

namespace App\Http\Controllers;

use App\Services\GameManager;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $gameMngr;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->gameMngr = new GameManager();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $games = $this->gameMngr->getGames();
        $data = array(
            'games' => $games
        );

        return view('home', $data);
    }
}
