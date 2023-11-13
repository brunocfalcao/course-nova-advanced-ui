<?php

namespace NovaAdvancedUI\Database\Factories;

use Eduka\Cube\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    private static $chapterIndex = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realTextBetween(4, 10),
        ];
    }
}
