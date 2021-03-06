<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SeasonManager;
use App\Services\GameManager;
use App\Services\UserManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AdminController extends Controller
{
    private $seasonMngr;
    private $gameMngr;
    private $userMngr;

    public function __construct(){
        $this->middleware('auth');
        $this->seasonMngr   = new SeasonManager();
        $this->gameMngr     = new GameManager();
        $this->userMngr     = new UserManager();
    }

    public function show()
    {
        $seasons = $this->seasonMngr->getSeasons();
        $data = array(
            'seasons' => $seasons,
            'user'    => Auth::user()
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

            //dd($request->all());

            $this->gameMngr->addGame($request);

        }

        return redirect('/admin');
    }

    public function addUser(Request $request){
        if($request->isMethod('POST')){

            $this->userMngr->addUser($request);
        }
        return redirect('/admin');
    }
}