<?php

namespace App\Http\Controllers\Api\Rating;

use App\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;
use App\Http\Requests\UserMovieRating\UserMovieRatingCreateRequest;
use App\Http\Requests\UserMovieRating\UserMovieRatingUpdateRequest;

class UserMovieRatingController extends Controller
{
    /**
     * Get rating by id.
     *
     * @param UserMovieRatingCreateRequest $request
     *
     * @return SuccessResponse
     */
    public function create(UserMovieRatingCreateRequest $request): SuccessResponse
    {
        $rating = new Rating();

        $rating->user_id  = auth()->user()->id;
        $rating->movie_id = $request->get('movie_id');
        $rating->value    = $request->get('rating');

        $rating->save();

        return new SuccessResponse('User rated movie.');
    }

    /**
     * Update rating by id.
     * @param UserMovieRatingUpdateRequest $request
     *
     * @return SuccessResponse
     */
    public function update(Request $request): SuccessResponse
    {
        logger(auth()->user());
    }
}
