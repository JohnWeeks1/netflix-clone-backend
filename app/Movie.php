<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * Get the category by movie.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
