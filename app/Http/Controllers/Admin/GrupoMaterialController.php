<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\GrupoMaterial;
use App\Http\Requests\GrupoMaterialRequest;

class GrupoMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.grupo_materials.index')->only('index');
        $this->middleware('can:admin.grupo_materials.create')->only('create', 'store');
        $this->middleware('can:admin.grupo_materials.edit')->only('edit', 'update');
        $this->middleware('can:admin.grupo_materials.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.grupo_materials.index');
    }

    public function create()
    {
        $zonas = Zona::all();
        return view('admin.grupo_materials.create', compact('zonas'));
    }

    public function store(GrupoMaterialRequest $request)
    {
        $grupo_material = GrupoMaterial::create($request->all());

        return redirect()->route('admin.grupo_materials.edit',$grupo_material)->with('info', 'El grupo de material se creó con éxito');
    }

    public function edit(GrupoMaterial $grupo_material)
    {
        $zonas = Zona::all();

        return view('admin.grupo_materials.edit', compact('grupo_material', 'zonas'));
    }

    public function update(GrupoMaterialRequest $request, GrupoMaterial $grupo_material)
    {
        $grupo_material->update($request->all());

        return redirect()->route('admin.grupo_materials.edit', $grupo_material)->with('info', 'El grupo de material se actualizó con éxito');
    }

    public function destroy(GrupoMaterial $grupo_material)
    {
        $grupo_material->delete();

        return redirect()->route('admin.grupo_materials.index')->with('info', 'El grupo de material se eliminó con éxito');
    }
}
