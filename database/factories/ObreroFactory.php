<?php

namespace Database\Factories;

use App\Models\Obrero;
use App\Models\GrupoObrero;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObreroFactory extends Factory
{
    protected $model = Obrero::class;

    public function definition()
    {
        return [
            'name'            => $this->faker->unique()->sentence(),
            'factor'          => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 1, $max = 4),
            'jornalhora'      => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 4, $max = 10),
            'grupo_obrero_id' => GrupoObrero::all()->random()->id,
        ];
    }
}
