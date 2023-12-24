<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvestorResource;
use App\Models\Investor;

class InvestorController extends Controller
{
    public function index()
    {
        return inertia('Investor/Index', [
            'investors' => InvestorResource::collection(Investor::all()),
        ]);
    }
}
