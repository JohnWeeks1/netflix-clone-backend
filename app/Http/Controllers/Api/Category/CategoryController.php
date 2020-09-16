<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoriesCollection;

class CategoryController extends Controller
{
    public function index()
    {
        return new CategoriesCollection(Category::all());
    }
}
