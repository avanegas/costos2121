<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Oferta;
use Illuminate\Database\Seeder;

class OfertaSeeder extends Seeder
{
    public function run()
    {
        $ofertas = Oferta::factory(30)->create();

        foreach ($ofertas as $oferta) {
            Image::factory(1)->create([
                'imageable_id' => $oferta->id,
                'imageable_type' => oferta::class
            ]);
        }
    }
}
