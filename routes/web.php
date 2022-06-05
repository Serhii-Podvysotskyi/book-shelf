<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'create']);
    Route::get('demo', [AuthController::class, 'demo']);
});

Route::middleware('auth')->group(function () {
    Route::get('book', [BookController::class, 'create'])->name('create-book');
    Route::post('book', [BookController::class, 'store']);
    Route::get('books', [BookController::class, 'index'])->name('books');
    Route::get('books/{book}', [BookController::class, 'edit'])->name('book');
    Route::post('books/{book}', [BookController::class, 'update']);

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
