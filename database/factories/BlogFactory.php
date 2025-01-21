<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
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
            'image' => fake()->imageUrl(),
            'excerpt' => fake()->text(),
            'content' => fake()->text(),
            'alt' => fake()->sentence(),
            'seo_title' => fake()->sentence(),
            'seo_description' => fake()->text(),
            'seo_keywords' => fake()->sentence(),
            'seo_author' => fake()->name(),
            'seo_image' => fake()->image(),
        ];
    }
}
