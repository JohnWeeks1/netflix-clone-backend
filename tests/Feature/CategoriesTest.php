<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
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
    public function authenticated_user_can_see_categories()
    {
        $this->actingAsSubscriber();

        $this->get('/api/categories')->assertOk();
    }
}
