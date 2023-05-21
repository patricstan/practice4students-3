<?php

namespace App\Http\Controllers;

use App\Models\Company;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('welcome', [
            'companies' =>  Company::inRandomOrder()->limit(5)->get(),
        ]);
    }
}
