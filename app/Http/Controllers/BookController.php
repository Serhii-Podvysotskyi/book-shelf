<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\GenreResource;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class BookController extends Controller
{
    /**
     * Show user book list page
     *
     * @return Response
     */
    public function index(): Response
    {
        $books = Auth::user()->books()->with(['genres'])->get();

        return Inertia::render('Books/List', [
            'books' => BookResource::collection($books),
        ]);
    }

    /**
     * Show create book page
     *
     * @return Response
     */
    public function create(): Response
    {
        $genres = Genre::query();

        return Inertia::render('Books/Create', [
            'genres' => fn() => GenreResource::collection($genres->get())
        ]);
    }

    /**
     * Create new book
     *
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        $book = new Book();
        $book->fill($request->only(['name', 'author', 'year', 'description']));
        $book->user()->associate(Auth::user());
        $book->save();

        $book->genres()->sync((array)$request->get('genres'));

        return redirect()->route('books');
    }

    /**
     * Show edit book page
     *
     * @param Book $book
     * @return Response
     */
    public function edit(Book $book): Response
    {
        $genres = Genre::query()->get();

        return Inertia::render('Books/Edit', [
            'book' => new BookResource($book),
            'genres' => GenreResource::collection($genres),
        ]);
    }

    /**
     * Update book
     *
     * @param BookRequest $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $data = $request->only(['name', 'author', 'year', 'description']);

        $book->fill($data)->save();

        return redirect()->route('books');
    }
}
