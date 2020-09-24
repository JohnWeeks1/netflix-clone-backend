<?php

namespace Tests\Feature;

use App\Category;
use App\Movie;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MoviesTest extends TestCase
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
    public function authenticated_user_can_see_movies_list_if_is_subscribed()
    {
        $this->actingAs(factory(User::class)->create([
            'isSubscribed' => 1
        ]));

        $this->get('/api/movies')->assertOk();
    }

    /** @test */
    public function authenticated_user_can_not_see_movies_list_if_is_not_subscribed()
    {
        $this->actingAsSubscriber();

        // 0 means not subscribed.
        $this->assertEquals(0, User::first()->isSubscribed);

        $this->get('/api/movies')->assertOk();
    }

    /** @test */
    public function authenticated_user_can_see_movie_by_id()
    {
        $this->actingAsSubscriber();

        $category = factory(Category::class)->create();

        $movie = factory(Movie::class)->create(['category_id' => $category->id]);

        $this->get('/api/movies/' . $movie->id)->assertOk();

        $this->assertCount(1, Category::all());
        $this->assertCount(1, Movie::all());
    }
}
