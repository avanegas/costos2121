<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'excerpt'     => $this->faker->text(250),
            'body'        => $this->faker->text(2000),
            'status'      => $this->faker->randomElement(['PUBLISHED', 'DRAFT']),
            'category_id' => Category::all()->random()->id,
            'user_id'     => User::all()->random()->id,
        ];
    }
}
