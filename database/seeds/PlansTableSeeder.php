<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Plan::create([
            'title' => 'Monthly Subscription',
            'identifier' => 'monthly_subscription',
            'stripe_id' => 'price_1HUcauGR9pp3hPkuyUqZ7RJk',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
