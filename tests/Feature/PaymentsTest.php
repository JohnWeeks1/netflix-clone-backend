<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Acting as subscriber.
     */
    private function actingAsSubscriber()
    {
        $this->actingAs(factory(User::class)->create());
    }

    /** @test */
    public function authenticated_user_can_see_payment_section()
    {
        $this->actingAsSubscriber();

        $this->get('/api/payment/setup-intent')->assertOk();
    }

//    /** @test */
//    public function authenticated_user_can_add_payment_details()
//    {
//        //TODO
//    }
}
