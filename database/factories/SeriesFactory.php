<?php

namespace NovaAdvancedUI\Database\Factories;

use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeriesFactory extends Factory
{
    protected $model = Series::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realTextBetween(30, 100),
            'details' => $this->faker->realTextBetween(150, 250),
        ];
    }

    /**
     * Select course id for given chapter. Uses chapter's name to determine the chapter.
     */
    public function forCourse(string $name): Factory
    {
        $id = Course::where('name', $name)->first()->id;

        return $this->state(function (array $attributes) use ($id) {
            return [
                'course_id' => $id,
            ];
        });
    }
}
