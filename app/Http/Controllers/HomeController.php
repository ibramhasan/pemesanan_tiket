<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\TravelPackages;

class HomeController extends Controller
{
    public function index()
    {
        $items= TravelPackages::with(['galleries'])->get();
        return view('pages.home', compact('items'));
    }
}
