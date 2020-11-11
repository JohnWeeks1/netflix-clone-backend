<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable = [
        'user_id', 'movie_id', 'value'
    ];
    /**
     * Get the user by rating.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
