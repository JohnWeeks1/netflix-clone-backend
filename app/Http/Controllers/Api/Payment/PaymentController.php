<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;
use App\Plan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json([
            'intent' => auth()->user()->createSetupIntent()
        ], 200);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $paymentMethod = $request->payment_method;
        $plan = Plan::findOrFail(env('DEFAULT_PLAN_ID'));

        $user->newSubscription(
            'default',
            $plan->stripe_id
        )->create($paymentMethod);

        $user->isSubscribed = 1;
        $user->save();

        return new SuccessResponse('User with id: ' . $user->id . ' is subscribed');
    }
}
