<?php

namespace Database\Factories;

use App\Models\Zona;
use App\Models\GrupoObrero;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoObreroFactory extends Factory
{
    protected $model = GrupoObrero::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->unique()->word(20),
            'description' => $this->faker->text(100),
            'zona_id'     => Zona::all()->random()->id,
        ];
    }
}
