<?php

namespace App\Http\Controllers\Api\Movie;

use App\Movie;
use App\Http\Controllers\Controller;
use App\Http\Resources\Movie\MoviesCollection;

class MovieController extends Controller
{
    public function index()
    {
        return new MoviesCollection(Movie::all());
    }
}
