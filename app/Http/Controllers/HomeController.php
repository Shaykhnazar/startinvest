<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function aboutUs()
    {
        return Inertia::render('AboutUs');
    }
}
