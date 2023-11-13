<?php

namespace NovaAdvancedUI\Database\Factories;

use Eduka\Cube\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    private static $userOldId = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'receives_notifications' => $this->faker->boolean(),
            'uuid' => Str::uuid()->toString(),
            'old_id' => $this->faker->boolean() ? null : self::$userOldId++,
        ];
    }
}
