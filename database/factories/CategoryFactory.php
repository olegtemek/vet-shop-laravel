<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->text(20);
        $category_id = fake()->numberBetween(0, 1);
        return [
            'title' => $title,
            'parent_id' => $category_id == 0 ? null : $category_id,
            'description' => fake()->text(20),
            'slug' => Str::slug($title),
        ];
    }
}
