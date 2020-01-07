<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GamesController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function home(Request $request)
    {
        if ($request->has('search')) {
            $teams = Team::where('id', $request->get('search'))->get();
        } else {
            $teams = Team::all();
        }

        return view('games', ['teams' => $teams]);
    }
}
