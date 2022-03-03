<div class="card">
    <div class="card-header form-inline">
        <div class="col-8">
             <input wire:model="search" type="text" class="w-100 form-control" placeholder="Ingrese un rol de usuario">
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

    @if ($roles->count())
        <div class="card-body">
            <table  class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Permisos</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{ $role->permissions()->pluck('name')->implode(', ') }}</td>
                        <td style="width:10px">
                            @can('admin.roles.edit')
                                <a href="{{route('admin.roles.edit', $role)}}"><i class="fa fa-edit"></i></a>
                            @endcan
                        </td>
                        <td style="width:10px">
                            @can('admin.roles.destroy')
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
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
            {{$roles->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

</div>
