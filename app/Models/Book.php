<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @property integer $id
 * @property string $name
 * @property string $author
 * @property string|null $description
 * @property integer|null $year
 * @property string|null $image
 * @property boolean $demo
 * @property User $user
 * @property Collection $genres
 */
class Book extends Model
{
    use HasFactory, SoftDeletes, HasFactory;

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'demo' => false,
        'year' => null,
        'image' => null,
        'description' => null,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'author',
        'year',
        'description',
        'image',
        'demo'
    ];

    /**
     * Get the user that owns the book.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the genres for the book.
     *
     * @return BelongsToMany
     */
    public function genres(): BelongsToMany
    {
        return $this->BelongsToMany(Genre::class, 'book_genres');
    }
}
