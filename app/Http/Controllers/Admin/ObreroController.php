<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GrupoObrero;
use App\Models\Obrero;
use App\Http\Requests\ObreroRequest;

class ObreroController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.obreros.index')->only('index');
        $this->middleware('can:admin.obreros.create')->only('create', 'store');
        $this->middleware('can:admin.obreros.edit')->only('edit', 'update');
        $this->middleware('can:admin.obreros.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.obreros.index');
    }

    public function create()
    {
        $grupo_obreros = GrupoObrero::all();
        return view('admin.obreros.create', compact('grupo_obreros'));
    }

    public function store(ObreroRequest $request)
    {
        $obrero = Obrero::create($request->all());

        return redirect()->route('admin.obreros.edit',$obrero)->with('info', 'El obrero se creó con éxito');
    }

    public function edit(Obrero $obrero)
    {
        $grupo_obreros = GrupoObrero::all();

        return view('admin.obreros.edit', compact('obrero', 'grupo_obreros'));
    }

    public function update(ObreroRequest $request, Obrero $obrero)
    {
        $obrero->update($request->all());

        return redirect()->route('admin.obreros.edit', $obrero)->with('info', 'El obrero se actualizó con éxito');
    }

    public function destroy(Obrero $obrero)
    {
        $obrero->delete();

        return redirect()->route('admin.obreros.index')->with('info', 'El obrero se eliminó con éxito');
    }
}
