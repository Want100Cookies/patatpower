<?php

namespace App\Http\Controllers;

use App\MenuItem;

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
        return view('home', compact('menu'));
    }
}
