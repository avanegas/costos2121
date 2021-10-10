<?php

namespace Database\Seeders;

use App\Models\Transporte;
use App\Models\Obrero;
use App\Models\Material;
use App\Models\Equipo;
use App\Models\AprecioTransporte;
use App\Models\AprecioObrero;
use App\Models\AprecioMaterial;
use App\Models\AprecioEquipo;
use App\Models\Precio;
use Illuminate\Database\Seeder;

class PrecioSeeder extends Seeder
{
    public function run()
    {
        $precios = Precio::factory(30)->create();

        foreach($precios as $precio){
            foreach (range(1, mt_rand(3, 5)) as $j) {
                $equipo = Equipo::all()->random(1)->first();
                $cantidad = rand(0, 4) + rand(4, 1000)/1000;
                $rendimiento = rand(0, 4) + rand(4,1000)/1000;
                AprecioEquipo::create([
                    'precio_id'  => $precio->id,
                    'equipo_id'  => $equipo->id,
                    'name'       => $equipo->name,
                    'tarifa'     => $equipo->tarifa,
                    'cantidad'   => $cantidad,
                    'rendimiento'=> $rendimiento,
                    'total'      => $equipo->tarifa * $cantidad * $rendimiento
                ]);
            }
            foreach (range(1, mt_rand(3, 7)) as $k) {
                $material = Material::all()->random(1)->first();
                $cantidad = rand(0, 4) + rand(4, 1000) / 1000;
                AprecioMaterial::create([
                    'precio_id'  => $precio->id,
                    'material_id'=> $material->id,
                    'name'       => $material->name,
                    'unidad'     => $material->unidad,
                    'precio'     => $material->precio,
                    'cantidad'   => $cantidad,
                    'total'      => $material->precio * $cantidad
                ]);
            }
            foreach (range(1, mt_rand(3, 7)) as $l) {
                $obrero = Obrero::all()->random(1)->first();
                $cantidad = rand(0, 4) + rand(4, 1000) / 1000;
                $rendimiento = rand(0, 4) + rand(4, 1000) / 1000;
                AprecioObrero::create([
                    'precio_id'  => $precio->id,
                    'obrero_id'  => $obrero->id,
                    'name'       => $obrero->name,
                    'jornalhora' => $obrero->jornalhora,
                    'cantidad'   => $cantidad,
                    'rendimiento'=> $rendimiento,
                    'total'      => $obrero->jornalhora * $cantidad * $rendimiento
                ]);
            }
            foreach (range(1, mt_rand(1, 4)) as $m) {
                $transporte = Transporte::all()->random(1)->first();
                $cantidad = rand(0, 4) + rand(4, 1000) / 1000;
                $distancia = rand(0, 4) + rand(4, 1000) / 1000;
                AprecioTransporte::create([
                    'precio_id'     => $precio->id,
                    'transporte_id' => $transporte->id,
                    'name'          => $transporte->name,
                    'unidad'        => $transporte->unidad,
                    'tarifa'        => $transporte->tarifa,
                    'cantidad'      => $cantidad,
                    'distancia'     => $distancia,
                    'total'         => $transporte->tarifa*$cantidad*$distancia,
                ]);
            }            
        }
    }
}
