<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function __construct()
    {
       /* $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');*/
    }

    public function index()
    {
        return view('admin.servicios.index');
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
            ]);

        $servicio = Servicio::create($request->all());

        return redirect()->route('admin.servicios.edit', $servicio)->with('info', 'El servicio se creó con éxito');
    }

    public function edit(Servicio $servicio)
    {
        return view('admin.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:servicios,slug,$servicio->id"
        ]);

        $servicio->update($request->all());

        return redirect()->route('admin.servicios.edit', $servicio)->with('info', 'La servicio se actualizó con éxito');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('admin.servicios.index')->with('info', 'El servicio se eliminó con éxito');
    }
}
