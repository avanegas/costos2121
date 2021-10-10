<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name'         => $name,
            'contratante'  => $this->faker->sentence(),
            'ubicacion'    => $this->faker->sentence(),
            'oferente'     => $this->faker->sentence(),
            'entrega'      => $this->faker->date($format = 'Y-m-d'),
            'referencial'  => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0.1, $max = 100),
            'distancia'    => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0.1, $max = 100),
            'formato'      => $this->faker->word(10),
            'precision'    => $this->faker->numberBetween(2,4),            
            'representante'=> $this->faker->name(),
            'user_id'      => User::all()->random()->id,
        ];
    }
}
