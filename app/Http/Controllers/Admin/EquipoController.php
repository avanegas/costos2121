<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GrupoEquipo;
use App\Models\Equipo;
use App\Http\Requests\EquipoRequest;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.equipos.index')->only('index');
        $this->middleware('can:admin.equipos.create')->only('create', 'store');
        $this->middleware('can:admin.equipos.edit')->only('edit', 'update');
        $this->middleware('can:admin.equipos.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.equipos.index');
    }

    public function create()
    {
        $grupo_equipos = GrupoEquipo::all();
        return view('admin.equipos.create', compact('grupo_equipos'));
    }

    public function store(EquipoRequest $request)
    {
        $equipo = Equipo::create($request->all());

        return redirect()->route('admin.equipos.edit',$equipo)->with('info', 'El equipo se creó con éxito');
    }

    public function edit(Equipo $equipo)
    {
        /*$this->authorize('author', $equipo);*/

        $grupo_equipos = GrupoEquipo::all();

        return view('admin.equipos.edit', compact('equipo', 'grupo_equipos'));
    }

    public function update(EquipoRequest $request, Equipo $equipo)
    {
        /*$this->authorize('author', $equipo);*/

        $equipo->update($request->all());

        return redirect()->route('admin.equipos.edit', $equipo)->with('info', 'El equipo se actualizó con éxito');
    }

    public function destroy(Equipo $equipo)
    {
        /*$this->authorize('author', $equipo);*/

        $equipo->delete();

        return redirect()->route('admin.equipos.index')->with('info', 'El equipo se eliminó con éxito');
    }
}
