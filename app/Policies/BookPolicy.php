<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Book $book
     * @return bool
     */
    public function view(User $user, Book $book): bool
    {
        return $book->user_id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Book $book
     * @return bool
     */
    public function update(User $user, Book $book): bool
    {
        return $book->user_id === $user->id;
    }
}
