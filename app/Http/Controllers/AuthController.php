<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    /**
     * Show user login page
     *
     * @return Response
     */
    public function login(): Response
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Authenticate user
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            // Create new sessions for auth user
            $request->session()->regenerate();

            return redirect()->to(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => trans('auth.failed'),
        ])->onlyInput('email');
    }

    /**
     * Show user register form
     *
     * @return Response
     */
    public function register(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Create new user
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function create(RegisterRequest $request): RedirectResponse
    {
        // Create new user from request
        $user = User::create($request->only(['email', 'name']) + [
                'password' => Hash::make($request->get('password'))
            ]);

        // Create new sessions for auth user
        $request->session()->regenerate();
        Auth::login($user);

        return redirect()->to(RouteServiceProvider::HOME);
    }

    /**
     * Logout user
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->to(RouteServiceProvider::HOME);
    }

    /**
     * Create demo account
     *
     * @return RedirectResponse
     */
    public function demo(): RedirectResponse
    {
        $user = User::factory()->create(['demo' => true]);

        Auth::login($user);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
