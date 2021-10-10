<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'bio'   => $this->faker->text(100),
            'phone' => $this->faker->phoneNumber,
            'twitter_username' => '@' . $this->faker->word(10),
            'github_username'  => 'http://' . $this->faker->word(10) . '.github.io',
        ];
    }
}
