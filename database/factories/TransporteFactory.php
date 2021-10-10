<?php

namespace Database\Factories;

use App\Models\Zona;
use App\Models\Transporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransporteFactory extends Factory
{
    protected $model = Transporte::class;

    public function definition()
    {
        return [
            'name'    => $this->faker->unique()->sentence(),
            'unidad'  => $this->faker->word(10),
            'tipo'    => $this->faker->word(10),
            'tarifa'  => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0.1, $max = 10),
            'zona_id' => Zona::all()->random()->id,
        ];
    }
}
