<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.zonas.index')->only('index');
        $this->middleware('can:admin.zonas.create')->only('create', 'store');
        $this->middleware('can:admin.zonas.edit')->only('edit', 'update');
        $this->middleware('can:admin.zonas.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.zonas.index');
    }

    public function create()
    {
        return view('admin.zonas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $zona = Zona::create($request->all());

        return redirect()->route('admin.zonas.edit', $zona)->with('info', 'La zona se creó con éxito');
    }

    public function edit(Zona $zona)
    {
        return view('admin.zonas.edit', compact('zona'));
    }

    public function update(Request $request, Zona $zona)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $zona->update($request->all());

        return redirect()->route('admin.zonas.edit', $zona)->with('info', 'La zona se actualizó con éxito');
    }

    public function destroy(Zona $zona)
    {
        $zona->delete();

        return redirect()->route('admin.zonas.index')->with('info', 'La zona se eliminó con éxito');
    }
}
