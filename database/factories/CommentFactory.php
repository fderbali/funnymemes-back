<?php

namespace Database\Factories;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text,
            'meme_id' => function(){
                return Meme::all()->random();
            },
            'user_id' => function(){
                return User::all()->random();
            }
        ];
    }
}
