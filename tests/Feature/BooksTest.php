<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Database\Seeders\GenreSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class BooksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test books page response for auth user
     *
     * @return void
     */
    public function test_books_page_response(): void
    {
        $user = User::factory()->create();
        $books = Book::factory()->count(5)->for($user)->create();

        $this->actingAs($user)->get('/books')
            ->assertInertia(function (Assert $page) use ($books) {
                $book = $books->first();

                $page->component('Books/List')
                    ->hasAll([
                        'books' => $books->count(),
                        'books.0.genres' => 0,
                    ])->whereAll([
                        'books.0.id' => $book->id,
                        'books.0.image' => $book->image,
                        'books.0.name' => $book->name,
                        'books.0.year' => $book->year,
                        'books.0.description' => $book->description,
                        'books.0.author' => $book->author,
                    ]);
            });
    }

    /**
     * Test book create page response for auth user
     *
     * @return void
     */
    public function test_book_create_page_returns_response(): void
    {
        $this->seed(GenreSeeder::class);

        $user = User::factory()->create();
        $genres = Genre::query()->get();

        $this->actingAs($user)->get('/book')
            ->assertInertia(function (Assert $page) use ($genres) {
                $genre = $genres->first();
                $page->component('Books/Create')
                    ->has('csrf_token')
                    ->hasAll([
                        'genres' => $genres->count(),
                    ])->whereAll([
                        'genres.0.id' => $genre->id,
                        'genres.0.name' => $genre->name,
                    ]);
            });
    }

    /**
     * Test book create page form response
     *
     * @return void
     */
    public function test_book_create_page_form_returns_response(): void
    {
        $user = User::factory()->create();

        $data = [
            'name' => Str::random(10),
            'author' => Str::random(10),
        ];

        $this->actingAs($user)->post('/book', $data)
            ->assertValid()
            ->assertRedirect(url('/books'));

        // Check if book model was created
        $this->assertDatabaseHas('books', [
            'name' => $data['name'], 'author' => $data['author']
        ]);
    }

    /**
     * Test book edit page response for auth user
     *
     * @return void
     */
    public function test_book_edit_page_returns_response(): void
    {
        $this->seed(GenreSeeder::class);

        $user = User::factory()->create();
        $book = Book::factory()->for($user)->create();
        $genres = Genre::query()->get();

        $this->actingAs($user)->get("/books/{$book->id}")
            ->assertInertia(function (Assert $page) use ($book, $genres) {
                $genre = $genres->first();
                $page->component('Books/Edit')
                    ->has('csrf_token')
                    ->hasAll([
                        'genres' => $genres->count(),
                    ])->whereAll([
                        'genres.0.id' => $genre->id,
                        'genres.0.name' => $genre->name,
                    ])->hasAll([
                        'book',
                        'book.genres' => 0,
                    ])->whereAll([
                        'book.id' => $book->id,
                        'book.image' => $book->image,
                        'book.name' => $book->name,
                        'book.year' => $book->year,
                        'book.description' => $book->description,
                        'book.author' => $book->author,
                    ]);
            });
    }

    /**
     * Test book edit page form response
     *
     * @return void
     */
    public function test_book_edit_page_form_returns_response(): void
    {
        $user = User::factory()->create();

        $book = Book::factory()->for($user)->create();

        $data = [
            'name' => Str::random(10),
            'author' => Str::random(10),
        ];

        $this->actingAs($user)->post("/books/{$book->id}", $data)
            ->assertValid()
            ->assertRedirect(url('/books'));

        // Check if book model was updated
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'name' => $data['name'],
            'author' => $data['author'],
        ]);
    }
}
