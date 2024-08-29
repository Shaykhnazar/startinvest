<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CabinetController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Cabinet/Dashboard');
    }

    public function myProfile()
    {
        return Inertia::render('Cabinet/MyProfile');
    }

    public function startupTeams()
    {
        return Inertia::render('Cabinet/StartupTeams', [

        ]);
    }
}
