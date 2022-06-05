<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $fiction = ['Fantasy', 'Science Fiction', 'Dystopian', 'Action & Adventure', 'Mystery', 'Horror', 'Thriller & Suspense', 'Historical Fiction', 'Romance', 'Women’s Fiction', 'LGBTQ+', 'Contemporary Fiction', 'Literary Fiction', 'Magical Realism', 'Graphic Novel', 'Short Story', 'Young Adult', 'New Adult'];
        foreach ($fiction as $genre) {
            Genre::query()->create(['name' => $genre]);
        }

        $nonfiction = ['Memoir & Autobiography', 'Biography', 'Food & Drink', 'Art & Photography', 'Self-help', 'History', 'Travel', 'True Crime', 'Humor', 'Essays', 'Guide / How-to', 'Religion & Spirituality', 'Humanities & Social Sciences', 'Parenting & Families', 'Science & Technology', 'Children’s'];
        foreach ($nonfiction as $genre) {
            Genre::query()->create(['name' => $genre]);
        }
    }
}
