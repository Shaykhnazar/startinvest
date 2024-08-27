<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class CabinetController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Cabinet/Dashboard');
    }

    public function publicProfile()
    {
        return Inertia::render('Cabinet/PublicProfile');
    }

    public function privateProfile()
    {
        return Inertia::render('Cabinet/PrivateProfile');
    }

    public function teams()
    {
        return Inertia::render('Cabinet/Teams');
    }
}
