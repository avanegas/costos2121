<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\GrupoMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    protected $model = Material::class;

    public function definition()
    {
        return [
            'name'              => $this->faker->unique()->sentence(),
            'unidad'            => $this->faker->word(10),
            'precio'            => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0.1, $max = 1000),
            'grupo_material_id' => GrupoMaterial::all()->random()->id,
        ];
    }
}
