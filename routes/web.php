<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    // Login page
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);

    // Register page
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'create']);

    // Create demo user
    Route::get('demo', [AuthController::class, 'demo']);
});

Route::middleware('auth')->group(function () {
    // Get list of books
    Route::get('books', [BookController::class, 'index'])->name('books');

    // Create new book
    Route::get('book', [BookController::class, 'create'])->name('create-book');
    Route::post('book', [BookController::class, 'store']);

    // Update existing book
    Route::get('books/{book}', [BookController::class, 'edit'])->name('book')->can('view', 'book');
    Route::post('books/{book}', [BookController::class, 'update'])->can('view', 'update');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
