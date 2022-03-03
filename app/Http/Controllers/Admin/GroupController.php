<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.groups.index')->only('index');
        $this->middleware('can:admin.groups.create')->only('create', 'store');
        $this->middleware('can:admin.groups.edit')->only('edit', 'update');
        $this->middleware('can:admin.groups.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.groups.index');
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $group = Group::create($request->all());

        return redirect()->route('admin.groups.edit', $group)->with('info', 'El grupo se creó con éxito');
    }

    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $group->update($request->all());

        return redirect()->route('admin.groups.edit', $group)->with('info', 'El grupo se actualizó con éxito');
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('admin.groups.index')->with('info', 'El grupo se eliminó con éxito');
    }
}
