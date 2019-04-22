<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plants = Plant::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        return view('home', ['plants' => $plants]);
    }
}
