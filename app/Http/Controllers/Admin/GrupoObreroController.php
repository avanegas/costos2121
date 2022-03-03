<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\GrupoObrero;
use App\Http\Requests\GrupoObreroRequest;

class GrupoObreroController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.grupo_obreros.index')->only('index');
        $this->middleware('can:admin.grupo_obreros.create')->only('create', 'store');
        $this->middleware('can:admin.grupo_obreros.edit')->only('edit', 'update');
        $this->middleware('can:admin.grupo_obreros.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.grupo_obreros.index');
    }

    public function create()
    {
        $zonas = Zona::all();
        return view('admin.grupo_obreros.create', compact('zonas'));
    }

    public function store(GrupoObreroRequest $request)
    {
        $grupo_obrero = GrupoObrero::create($request->all());

        return redirect()->route('admin.grupo_obreros.edit',$grupo_obrero)->with('info', 'El grupo de obrero se creó con éxito');
    }

    public function edit(GrupoObrero $grupo_obrero)
    {
        $zonas = Zona::all();

        return view('admin.grupo_obreros.edit', compact('grupo_obrero', 'zonas'));
    }

    public function update(GrupoObreroRequest $request, GrupoObrero $grupo_obrero)
    {
        $grupo_obrero->update($request->all());

        return redirect()->route('admin.grupo_obreros.edit', $grupo_obrero)->with('info', 'El grupo de obrero se actualizó con éxito');
    }

    public function destroy(GrupoObrero $grupo_obrero)
    {
        $grupo_obrero->delete();

        return redirect()->route('admin.grupo_obreros.index')->with('info', 'El grupo de obreros se eliminó con éxito');
    }
}
