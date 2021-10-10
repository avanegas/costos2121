<?php

namespace Database\Seeders;

use App\Models\AprojectRubro;
use App\Models\Precio;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 20) as $i) {

            
            foreach (range(1, mt_rand(10, 20)) as $j) {

                $precio    = Precio::all()->random(1)->first();
                $valor_pre = $precio->directo;
                $indirecto = rand(10, 40);
                $cantidad  = rand(0, 4) + rand(4, 1000) / 1000;

                AprojectRubro::create([
                    'project_id' => $i,
                    'precio_id'   => $precio->id,
                    'orden'       => $j,
                    'rubro'       => $precio->name,
                    'unidad'      => $precio->unidad,
                    'cantidad'    => $cantidad,
                    'precio'      => $valor_pre * $indirecto/100,
                    'total'       => $cantidad * $valor_pre * $indirecto / 100,
                ]);
            }
            $rubros    = AprojectRubro::where('project_id', $i)->get();
            $subTotal  = $rubros->sum('total');
            $impuestos = $subTotal * 0.12;
            $total     = $subTotal + $impuestos;

            $project = Project::factory(1)->create([
                'indirecto'    => $indirecto,
                'impuesto'     => 12,
                'sub_total'    => $subTotal,
                'gran_total'   => $total,
            ]);

        }
    }
}
