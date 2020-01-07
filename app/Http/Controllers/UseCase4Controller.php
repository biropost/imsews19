<?php

namespace App\Http\Controllers;

use App\Player;
use App\TeamPerformance;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UseCase4Controller extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function home(Request $request)
    {
        if ($request->has('search')) {
            $performances = TeamPerformance::where('id', $request->get('search'))->get();
        } else {
            $performances = TeamPerformance::all();
        }

        return view('usecase4', ['performances' => $performances]);
    }
}
