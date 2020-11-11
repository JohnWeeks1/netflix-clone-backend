<?php

namespace App\Http\Controllers\Api\Rating;

use App\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;

class UserMovieRatingController extends Controller
{
    /**
     * Get rating by id.
     *
     * @param Request $request
     *
     * @return SuccessResponse
     */
    public function create(Request $request): SuccessResponse
    {
        $rating = new Rating();

        $rating->user_id  = auth()->user()->id;
        $rating->movie_id = $request->get('movie_id');
        $rating->value    = $request->get('rating');

        $rating->save();

        return new SuccessResponse('User rated movie.');
    }
}
