<div class="card">
    <div class="card-header form-inline">
        <div class="col-8">
             <input wire:model="search" type="text" class="w-100 form-control" placeholder="Ingrese un precio unitario">
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

    @if ($precios->count())
        <div class="card-body">
            <table  class="table table-striped">
                <thead>
                    <tr>
                        <th>Grupo</th>
                        <th>Rubro</th>
                        <th>Unidad</th>
                        <th>Especificación</th>
                        <th>Costo</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($precios as $precio)
                        <tr>
                            <td>{{$precio->grupo_precio->name}}</td>
                            <td>{{$precio->name}}</td>
                            <td>{{$precio->unidad}}</td>
                            <td>{{$precio->detalle}}</td>
                            <td>{{$precio->directo}}</td>
                            <td style="width:10px;">
                                @can('admin.precios.edit')
                                    <a href="{{route('admin.precios.edit', $precio)}}"><i class="fa fa-edit"></i></a>
                                @endcan
                            </td>
                            <td style="width:10px;">
                                @can('admin.precios.destroy')
                                    <form action="{{route('admin.precios.destroy', $precio)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: transparent; border:none;"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {{$precios->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

</div>
