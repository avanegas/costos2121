<?php

namespace Database\Factories;

use App\Models\Zona;
use App\Models\GrupoPrecio;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoPrecioFactory extends Factory
{
    protected $model = GrupoPrecio::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->unique()->word(20),
            'description' => $this->faker->text(100),
            'zona_id'     => Zona::all()->random()->id,
        ];
    }
}
