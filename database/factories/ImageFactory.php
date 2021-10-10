<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 1200, 400, null, false)
        ];
    }
}
