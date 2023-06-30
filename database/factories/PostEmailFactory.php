<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostEmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subscription_id'=> Subscription::inRandomOrder()->first()->id ?? null,
            'post_id' => Post::inRandomOrder()->first()->id ?? null,
        ];
    }
}
