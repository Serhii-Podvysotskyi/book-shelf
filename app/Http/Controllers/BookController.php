<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class BookController extends Controller
{
    /**
     * Show user book list
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Books/List');
    }
}
