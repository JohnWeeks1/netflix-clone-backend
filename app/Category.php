<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the movies by category.
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
