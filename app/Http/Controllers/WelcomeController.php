<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    /**
     * Show the application welcome page
     *
     * @return Response|RedirectResponse
     */
    public function index(): Response|RedirectResponse
    {
        // Redirect if user authenticated
        if (Auth::check()) {
            return redirect()->route('books');
        }

        return Inertia::render('Welcome');
    }
}
