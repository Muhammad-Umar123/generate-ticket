<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function home()
    {
        $tickets = Event::all();
        return view('home', compact('tickets'));
    }


    public function dashboard()
    {
        return view('dashboard');
    }
}
