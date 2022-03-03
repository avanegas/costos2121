<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GrupoMaterial;
use App\Models\Material;
use App\Http\Requests\MaterialRequest;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.materials.index')->only('index');
        $this->middleware('can:admin.materials.create')->only('create', 'store');
        $this->middleware('can:admin.materials.edit')->only('edit', 'update');
        $this->middleware('can:admin.materials.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.materials.index');
    }

    public function create()
    {
        $grupo_materials = GrupoMaterial::all();
        return view('admin.materials.create', compact('grupo_materials'));
    }

    public function store(MaterialRequest $request)
    {
        $material = Material::create($request->all());

        return redirect()->route('admin.materials.edit',$material)->with('info', 'El material se creó con éxito');
    }

    public function edit(Material $material)
    {
        $grupo_materials = GrupoMaterial::all();

        return view('admin.materials.edit', compact('material', 'grupo_materials'));
    }

    public function update(MaterialRequest $request, Material $material)
    {
        $material->update($request->all());

        return redirect()->route('admin.materials.edit', $material)->with('info', 'El material se actualizó con éxito');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('admin.materials.index')->with('info', 'El material se eliminó con éxito');
    }
}
