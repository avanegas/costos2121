<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\GrupoEquipo;
use App\Http\Requests\GrupoEquipoRequest;

class GrupoEquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.grupo_equipos.index')->only('index');
        $this->middleware('can:admin.grupo_equipos.create')->only('create', 'store');
        $this->middleware('can:admin.grupo_equipos.edit')->only('edit', 'update');
        $this->middleware('can:admin.grupo_equipos.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.grupo_equipos.index');
    }

    public function create()
    {
        $zonas = Zona::all();
        return view('admin.grupo_equipos.create', compact('zonas'));
    }

    public function store(GrupoEquipoRequest $request)
    {
        $grupo_equipo = GrupoEquipo::create($request->all());

        return redirect()->route('admin.grupo_equipos.edit',$grupo_equipo)->with('info', 'El grupo de equipo se creó con éxito');
    }

    public function edit(GrupoEquipo $grupo_equipo)
    {
        $zonas = Zona::all();

        return view('admin.grupo_equipos.edit', compact('grupo_equipo', 'zonas'));
    }

    public function update(GrupoEquipoRequest $request, GrupoEquipo $grupo_equipo)
    {
        $grupo_equipo->update($request->all());

        return redirect()->route('admin.grupo_equipos.edit', $grupo_equipo)->with('info', 'El grupo de equipo se actualizó con éxito');
    }

    public function destroy(GrupoEquipo $grupo_equipo)
    {
        $grupo_equipo->delete();

        return redirect()->route('admin.grupo_equipos.index')->with('info', 'El grupo de equipo se eliminó con éxito');
    }
}
