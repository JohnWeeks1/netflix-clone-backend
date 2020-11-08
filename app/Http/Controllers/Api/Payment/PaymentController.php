<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Payment\PaymentIndex;
use App\Http\Responses\SuccessResponse;
use App\Plan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Get setup intent.
     *
     * @return PaymentIndex
     */
    public function index(): PaymentIndex
    {
        return new PaymentIndex(auth()->user());
    }

    /**
     * Setup and store payment.
     *
     * @param Request $request
     * @return SuccessResponse
     */
    public function store(Request $request): SuccessResponse
    {
        $user = $request->user();
        $paymentMethod = $request->get('payment_method');
        $plan = Plan::findOrFail(env('DEFAULT_PLAN_ID'));

        $user->newSubscription('monthly_subscription', $plan->stripe_id)->create($paymentMethod);

        $user->isSubscribed = 1;
        $user->save();

        return new SuccessResponse('User with id: ' . $user->id . ' is subscribed');
    }
}
