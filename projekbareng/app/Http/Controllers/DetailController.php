<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackages;

class DetailController extends Controller
{
  public function index(Request $request, $slug){
    $items= TravelPackages::with(['galleries'])->where('slug', $slug)->firstOrFail();
    return view('pages.detail', compact('items'));
  }
}
