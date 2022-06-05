<?php

namespace App\Http\Resources;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;

/**
 * @mixin Book
 */
class BookResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->name,
            'year' => $this->year,
            'author' => $this->author,
            'description' => $this->description,
            'genres' => GenreResource::collection($this->genres),
            'demo' => $this->when(Gate::allows('admin'), $this->demo),
        ];
    }
}
