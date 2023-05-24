<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardRedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        switch (auth()->user()->role) {
            case 'faculty':
                return Redirect::route('faculty.dashboard');
            case 'student':
                return Redirect::route('student.dashboard');
            case 'company':
                return Redirect::route('company.dashboard');
        }
    }
}
