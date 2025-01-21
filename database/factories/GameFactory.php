<?php

namespace Database\Factories;

use App\Enums\GameTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'content' => fake()->text(),
            'type' => fake()->randomElement(GameTypeEnum::cases()),
            'image' => fake()->imageUrl(),
            'alt' => fake()->sentence(),
            'seo_title' => fake()->sentence(),
            'seo_description' => fake()->text(),
            'seo_keywords' => fake()->sentence(),
            'seo_author' => fake()->name(),
            'seo_image' => fake()->image(),
        ];
    }
}
