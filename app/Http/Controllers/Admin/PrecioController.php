<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrupoPrecio;
use Illuminate\Http\Request;
use App\Models\Precio;
use App\Models\Equipo;
use App\Models\Material;
use App\Models\Obrero;
use App\Models\Transporte;

class PrecioController extends Controller
{

    public function index()
    {
        return view('admin.precios.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Precio $precio)
    {
        $grupo_precios= GrupoPrecio::all();
        $equipos = Equipo::all();
        $materials = Material::all();
        $obreros = Obrero::all();
        $transportes = Transporte::all();

        return view('admin.precios.edit', compact('precio', 'grupo_precios', 'equipos', 'materials', 'obreros', 'transportes'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
