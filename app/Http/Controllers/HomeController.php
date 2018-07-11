<?php

namespace App\Http\Controllers;

use App\MenuItem;
use App\PatatRun;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = MenuItem::take(5)->get();
        $activePatatRuns = PatatRun::active()->get();
        return view('home', compact('menu', 'activePatatRuns'));
    }
}
