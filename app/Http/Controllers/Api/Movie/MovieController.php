<?php

namespace App\Http\Controllers\Api\Movie;

use App\Movie;
use App\Http\Controllers\Controller;
use App\Http\Resources\Movie\MovieShow;
use App\Http\Resources\Movie\MoviesCollection;

class MovieController extends Controller
{
    /**
     * Get all movies.
     *
     * @return MoviesCollection
     */
    public function index(): MoviesCollection
    {
        return new MoviesCollection(Movie::all());
    }

    /**
     * Get movie by id.
     *
     * @param int $id
     *
     * @return MovieShow
     */
    public function show(int $id): MovieShow
    {
        return new MovieShow(Movie::findOrFail($id));
    }
}
