<div class="card">
    <div class="card-header form-inline">
        <div class="col-8">
            <input wire:model="search" type="text" class="w-100 form-control" placeholder="Ingrese un material">
        </div>
        <div class="col-3">
            <select wire:model="perPage" class="form-control w-100">
                <option value="20">20 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
        </div>
        <div class="col">
            @if($search !=='')
                <button wire:click="clear" class="form-control w-100">X</button>
            @endif
        </div>
    </div>

    @if ($materials->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th>Material</th>
                    <th>Unidad</th>
                    <th>Precio</th>
                    <th>Creado</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($materials as $material)
                    <tr>
                        <td>{{$material->id}}</td>
                        <td>{{$material->grupo_material->name}}</td>
                        <td>{{$material->name}}</td>
                        <td>{{$material->unidad}}</td>
                        <td>{{$material->precio}}</td>
                        <td>{{$material->created_at->diffForHumans()}}</td>
                        <td style="width:10px">
                            <a href="{{route('admin.materials.edit', $material)}}"><i class="fa fa-edit"></i></a>
                        </td>
                        <td style="width:10px">
                            <form action="{{route('admin.materials.destroy', $material)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: transparent; border:none;"><i class="fa fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {{$materials->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

</div>
