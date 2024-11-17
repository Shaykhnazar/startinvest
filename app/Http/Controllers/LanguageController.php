<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLanguage(Request $request)
    {
        $locale = $request->input('locale');
        // Store the locale in session
        $request->session()->put('locale', $locale);
        // Check if the request is an Inertia request
        if ($request->inertia()) {
            return redirect()->back();
        }

        return response()->json(['status' => 'success']);
    }
}
