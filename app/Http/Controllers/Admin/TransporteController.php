<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\Transporte;
use App\Http\Requests\TransporteRequest;

class TransporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.transportes.index')->only('index');
        $this->middleware('can:admin.transportes.create')->only('create', 'store');
        $this->middleware('can:admin.transportes.edit')->only('edit', 'update');
        $this->middleware('can:admin.transportes.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.transportes.index');
    }

    public function create()
    {
        $zonas = Zona::all();
        return view('admin.transportes.create', compact('zonas'));
    }

    public function store(TransporteRequest $request)
    {
        $transporte = Transporte::create($request->all());

        return redirect()->route('admin.transportes.edit',$transporte)->with('info', 'El transporte se creó con éxito');
    }

    public function edit(Transporte $transporte)
    {
        $zonas = Zona::all();

        return view('admin.transportes.edit', compact('transporte', 'zonas'));
    }

    public function update(TransporteRequest $request, Transporte $transporte)
    {
        $transporte->update($request->all());

        return redirect()->route('admin.transportes.edit', $transporte)->with('info', 'El transporte se actualizó con éxito');
    }

    public function destroy(Transporte $transporte)
    {
        $transporte->delete();

        return redirect()->route('admin.transportes.index')->with('info', 'El transporte se eliminó con éxito');
    }
}
