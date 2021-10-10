<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        return [
            'name'  => $name,
            'slug'  => Str::slug($name),
            'color' => $this->faker->randomElement(['red','indigo','purple','yellow','orange','teal','green','blue','gray','pink']),
        ];
    }
}
