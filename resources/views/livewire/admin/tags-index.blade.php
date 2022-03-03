<div class="card">
    <div class="card-header form-inline">
        <div class="col-8">
             <input wire:model="search" type="text" class="w-100 form-control" placeholder="Ingrese una etiqueta de artículo">
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

    @if ($tags->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                         <tr>
                             <td>{{$tag->id}}</td>
                             <td>{{$tag->name}}</td>
                             <td>{{$tag->color}}</td>
                             <td style="width:10px;">
                                @can('admin.tags.edit')
                                    <a href="{{route('admin.tags.edit', $tag)}}"><i class="fa fa-edit"></i></a>
                                @endcan
                             </td>
                             <td style="width:10px;">
                                @can('admin.tags.destroy')
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button style="background-color: transparent; border:none;" type="submit"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                @endcan
                             </td>
                         </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {{$tags->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

</div>
