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

    public function privacyPolicy()
    {
        return Inertia::render('PrivacyPolicy');
    }

    public function userAgreement()
    {
        return Inertia::render('UserAgreement');
    }
}
