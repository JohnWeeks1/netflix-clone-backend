<?php

namespace App\Http\Resources\Movie;

use App\Http\Resources\Category\CategoryIndex;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MoviesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($movie) {
                return [
                    'id' => $movie->id,
                    'title' => $movie->title,
                    'category' => new CategoryIndex($movie->category)
                ];
            })
        ];
    }
}
