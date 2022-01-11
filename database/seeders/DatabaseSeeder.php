<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Meme::factory(50)->create();
        \App\Models\Comment::factory(50)->create();
        \App\Models\Like::factory(50)->create();
    }
}
