<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'username' => $this->faker->username(),
            'avatar' => $this->faker->imageUrl($width = 640, $height = 480),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'bio' => $this->faker->text($maxNbChars = 200),
            'last_online' => $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}
