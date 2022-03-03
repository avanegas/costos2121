<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Http\Requests\OfertaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class OfertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ofertas.index')->only('index');
        $this->middleware('can:admin.ofertas.create')->only('create', 'store');
        $this->middleware('can:admin.ofertas.edit')->only('edit', 'update');
        $this->middleware('can:admin.ofertas.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.ofertas.index');
    }

    public function create()
    {
        return view('admin.ofertas.create');
    }

    public function store(OfertaRequest $request)
    {
        //dd($request->all());
        $oferta = new Oferta;
        $oferta->user_id = $request->get('user_id');
        $oferta->name = $request->get('name');
        $oferta->slug = $request->get('slug');
        $oferta->unidad = $request->get('unidad');
        $oferta->descripcion = $request->get('descripcion');
        $oferta->stock = $request->get('stock');
        $oferta->precio = $request->get('precio');
        $oferta->status = $request->get('status');

        if ($request->hasFile('pdf')) {
            $file2 = $request->file('pdf');

            if ($file2->getClientOriginalExtension() == "pdf") {
                $file2->move(public_path().'\storage\archivos/',$file2->getClientOriginalName());
                $oferta->file = $file2->getClientOriginalName();
            } else {
                $oferta->file = 'Sin archivo';
            }
        }
        $oferta->save();

        if ($request->file('file')){
            $url = Storage::put('public/posts', $request->file('file'));
            $oferta->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.ofertas.edit',$oferta)->with('info', 'La oferta se creó con éxito');
    }

    public function edit(Oferta $oferta)
    {
        return view('admin.ofertas.edit', compact('oferta'));
    }

    public function update(OfertaRequest $request, Oferta $oferta)
    {
        //$oferta->update($request->all());

        $oferta = Oferta::find($oferta->id);
        //$oferta->user_id = $request->get('user_id');
        $oferta->name = $request->get('name');
        $oferta->slug = $request->get('slug');
        $oferta->unidad = $request->get('unidad');
        $oferta->descripcion = $request->get('descripcion');
        $oferta->stock = $request->get('stock');
        $oferta->precio = $request->get('precio');
        $oferta->status = $request->get('status');
        if ($request->hasFile('pdf')) {
            $file2 = $request->file('pdf');
            if ($file2->getClientOriginalExtension() == "pdf") {
                File::delete(public_path().'\storage\archivos/',$oferta->file);
                $file2->move(public_path().'\storage\archivos/',$file2->getClientOriginalName());
                $oferta->file = $file2->getClientOriginalName();
            } else {
                $oferta->file = 'Sin archivo';
            }
        }
        $oferta->save();

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));
            if($oferta->image) {
                Storage::delete($oferta->image->url);
                $oferta->image->update([
                    'url' => $url
                ]);
            }else{
                $oferta->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.ofertas.edit', $oferta)->with('info', 'La oferta se actualizó con éxito');
    }

    public function destroy(Oferta $oferta)
    {
        $oferta->delete();

        return redirect()->route('admin.ofertas.index')->with('info', 'La oferta se eliminó con éxito');
    }
}
