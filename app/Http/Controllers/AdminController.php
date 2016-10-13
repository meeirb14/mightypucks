<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SeasonManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function addSeason(Request $request){
        if($request->isMethod('POST')){
            $this->seasonMngr->addSeason($request->input('seasonName'));
        }


        return redirect('/admin');
    }

    public function addGame(Request $request){
        if($request->isMethod('POST')){
            $this->seasonMngr->addGame(
                $request->input('youtubeLink'),
                $request->input('youtubeLink'),
                $request->input('date'),
                $request->input('season_id'),
                $request->input('vsTeam'),
                $request->input('winLoss'),
                $request->input('goalsFor'),
                $request->input('goalsAgainst')
            );
        }

        return redirect('/admin');
    }
}