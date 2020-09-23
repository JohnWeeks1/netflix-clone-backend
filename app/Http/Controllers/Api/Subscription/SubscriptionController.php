<?php

namespace App\Http\Controllers\Api\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        logger($request);
    }
}
