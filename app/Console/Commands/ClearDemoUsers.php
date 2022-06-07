<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class ClearDemoUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:demo-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Every day all demo users should be deleted';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        User::query()->where('demo', true)
            ->pluck(10, function (Collection $users) {
                $users->each(function (User $user) {
                    // Delete all user books
                    $user->books()->chunk(10, function (Collection $books) {
                        $books->each(function (Book $book) {
                            $book->delete();
                        });
                    });

                    // Delete user model
                    $user->delete();
                });
            });
        return 0;
    }
}
