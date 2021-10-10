<?php

namespace Database\Factories;

use App\Models\Equipo;
use App\Models\GrupoEquipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    protected $model = Equipo::class;

    public function definition()
    {
        return [
            'name'            => $this->faker->unique()->sentence(),
            'marca'           => $this->faker->word(10),
            'tipo'            => $this->faker->word(10),
            'tarifa'          => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0.1, $max = 100),
            'grupo_equipo_id' => GrupoEquipo::all()->random()->id,
        ];
    }
}
