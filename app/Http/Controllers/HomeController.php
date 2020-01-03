<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function home(Request $request)
    {
        if ($request->has('search')) {
            $players = Player::where('team_id', $request->get('search'))->get();
        } else {
            $players = Player::all();
        }

        return view('welcome', ['players' => $players]);
    }
}
