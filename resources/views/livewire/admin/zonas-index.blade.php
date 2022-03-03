<div class="card">
    <div class="card-header form-inline">
        <div class="col-8">
             <input wire:model="search" type="text" class="w-100 form-control" placeholder="Ingrese una zona de trabajo">
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

    @if ($zonas->count())
        <div class="card-body">
            <table  class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Zona de trabajo</th>
                        <th>Descripción</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($zonas as $zona)
                        <tr>
                            <td>{{$zona->id}}</td>
                            <td>{{$zona->user->name}}</td>
                            <td>{{$zona->name}}</td>
                            <td>{{$zona->description}}</td>
                            <td style="width:10px">
                                @can('admin.zonas.edit')
                                    <a href="{{route('admin.zonas.edit', $zona)}}"><i class="fa fa-edit"></i></a>
                                @endcan
                            </td>
                            <td style="width:10px">
                                @can('admin.zonas.destroy')
                                    <form action="{{route('admin.zonas.destroy', $zona)}}" method="POST">
                                        @csrf
                                        @method('delete')
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
            {{$zonas->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

</div>
