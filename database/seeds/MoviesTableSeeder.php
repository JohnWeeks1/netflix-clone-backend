<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'category_id' => 1,
            'title' => 'beach',
            'description' => 'This is a movie about the beach.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('movies')->insert([
            'category_id' => 1,
            'title' => 'city',
            'description' => 'This is a movie about the city.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('movies')->insert([
            'category_id' => 1,
            'title' => 'fish',
            'description' => 'This is a movie about the fish.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('movies')->insert([
            'category_id' => 1,
            'title' => 'mars',
            'description' => 'This is a movie about the mars.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('movies')->insert([
            'category_id' => 1,
            'title' => 'road',
            'description' => 'This is a movie about the road.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('movies')->insert([
            'category_id' => 1,
            'title' => 'water',
            'description' => 'This is a movie about the water.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
