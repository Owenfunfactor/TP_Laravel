<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index () {
        $cars = Car::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', ['cars' => $cars]);
    }

}
